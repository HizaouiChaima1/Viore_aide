<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commands;
use App\Models\Employe;
use App\Notifications\OrderCreated;

class CaisseController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('productId');
        $product = Produit::find($productId);
        if (!$product) {
            return redirect()->back()->withError('Le produit n\'existe pas.');
        }
        $cass = session()->get('cass', []);
        $clicks = session('clicks', []);
        if (array_key_exists($productId, $clicks)) {
            $clicks[$productId]++;
        } else {
            $clicks[$productId] = 1;
        }
        session(['clicks' => $clicks]);
    
        if (array_key_exists($productId, $cass)) {
            $cass[$productId]['quantity']++;
        } else {
            $cass[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
        session(['cass' => $cass]);
        return redirect()->back()->withSuccess('Le produit a été ajouté au panier.');
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'branch' => 'required|string',
            'type_commande' => 'required|string',
            'client' => 'nullable|string',
            'total_price' => 'required|numeric',
            'heure_arrivee' => 'required|date',
            'notes_ticket' => 'nullable|string',
            'notes_cuisine' => 'nullable|string',
            'produits' => 'required|array', // Ensure 'products' is an array
        ]);

        $command = new Commands();
        $command->branch = $validatedData['branch'];
        $command->type_commande = $validatedData['type_commande'];
        $command->client = $validatedData['client'];
        $command->source ='caissier';
        $command->total_price = $validatedData['total_price'];
        $command->heure_arrivee = $validatedData['heure_arrivee'];
        $command->notes_ticket = $validatedData['notes_ticket'];
        $command->notes_cuisine = $validatedData['notes_cuisine'];
        $command->produits= json_encode($validatedData['produits']);
        $command->save();
    
        $employees = Employe::all();
        foreach ($employees as $employee) {
            $employee->notify(new OrderCreated($command));
        }
    
        $this->refreshCartSession();
    
        return redirect()->back()->with('success', 'La commande a été enregistrée avec succès.');
    }

    public function refreshCartSession()
    {
        session()->forget('cass');
        session()->forget('success');
        session()->forget('clicks');

        return redirect()->back()->with('msg', 'Session du panier rafraîchie avec succès.');
    }

}