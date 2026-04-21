<?php
namespace App\Http\Controllers;
use App\Http\Requests\CommandsRequest;
use App\Models\Commands;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function closeOrder($orderId) {
        return redirect()->back()->with('success', 'La commande a été fermée avec succès.');
    } 
    public function markAsRead($id)
    {
        $notification = Auth::guard('employee')->user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
    public function markAllAsRead()
    {
        Auth::guard('employee')->user()->unreadNotifications->markAsRead();     
        return redirect()->back();
    }
    public function store(CommandsRequest $request)
    {      
    if (empty($request->total_price) || is_null($request->total_price)) {
        // Return an error message or redirect the user back to the form
        return redirect()->back()->withErrors(['total_price' => 'Le champ total_price ne peut être vide.']);
    }
        $commands = Commands::create($request->all());
        // Redirection ou affichage d'une vue appropriée
        return redirect()->route('admin.caisse')->with('success', 'Commande créée avec succès');
    }
    public function caisse()
    {
        $cmds = Commands::where('status', 'Traité')->get();
        $categories = Categorie::all();
        $produits = Produit::all();
    
        return view('admin.takeorder', compact('categories', 'produits', 'cmds'));
    }
   public function showCommandes()
   {
       // GRASP: Information Expert — Le modèle Commands gère lui-même
       // la conversion JSON via $casts, plus besoin de json_decode ici
       $commandes = Commands::all();
       return view('admin.cuisiner', compact('commandes'));
   }
   
    public function index()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        $cmds = Commands::all();
        foreach ($cmds as $command) {
            $command->randomId = Str::random(7);
        }
        return view('admin.ordres', compact('cmds'));
    }
    // OrderController.php
public function updateStatus(Request $request)
{
    $commande = Commands::find($request->commande_id);
    $commande->status = $request->status;
    $commande->save();

    return redirect()->back()->with('success', 'Status updated successfully');
}

public function indexx(): View
{
    $orders = commands::all();

    $totalOrders = $orders->count();

    // Calculate the number of orders each day
    $orderCountsByDay = DB::table('commands')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->groupBy('date')
        ->get()
        ->keyBy('date');

    // Calculate the number of orders each month
    $orderCountsByMonth = DB::table('commands')
        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
        ->groupBy('year', 'month')
        ->get()
        ->map(function ($item) {
            return [
                'year' => $item->year,
                'month' => $item->month,
                'count' => $item->count,
                'label' => date('F', mktime(0, 0, 0, $item->month, 1)),
            ];
        });

    return view('admin.tabledebord', compact('orders', 'totalOrders', 'orderCountsByDay','orderCountsByMonth'));
}

}