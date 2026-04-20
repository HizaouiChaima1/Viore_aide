<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commands;
use App\Models\Employe;
use App\Notifications\OrderCreated;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $product = Produit::find($productId);
    
        if (!$product) {
            return redirect()->back()->withError('Le produit n\'existe pas.');
        }
    
        $cart = session()->get('cart', []);
        $clicks = session('clicks', []);
    
        if (array_key_exists($productId, $clicks)) {
            $clicks[$productId]++;
        } else {
            $clicks[$productId] = 1;
        }
        session(['clicks' => $clicks]);
    
        if(array_key_exists($productId, $cart)) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
    
        session(['cart' => $cart]);
        return redirect()->back()->withSuccess('Le produit a été ajouté au panier.');
    }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'client' => 'required|string|max:255',
            'date' => 'required|date',
            'total' => 'required|numeric',
            'produits' => 'required|array',
        ]);

      
        $command = new Commands();
        $command->client = $validatedData['client'];
        $command->heure_arrivee = $validatedData['date'];
        $command->total_price = $validatedData['total'];
        $command->type_commande = 'sur place';
        $command->branch = 'branche1'; // Mettez ici la valeur appropriée pour la branche
        $command->produits= json_encode($validatedData['produits']);
        $command->save();
    
        $employees = Employe::all();
        foreach ($employees as $employee) {
            $employee->notify(new OrderCreated($command));
        }
    
        // Actualisation de la session du panier
        $this->refreshCartSession();
    
        return redirect()->back()->with('success', 'Produit ajouter avec sucess');
    }
    
    
    public function refreshCartSession()
    {
        session()->forget('cart'); // Supprimer uniquement les données du panier
        session()->forget('success'); // Supprimer uniquement les données du panier
        session()->forget('clicks');
        return redirect()->back()->with('msg', 'Session du panier rafraîchie avec succès.');
    }
}
