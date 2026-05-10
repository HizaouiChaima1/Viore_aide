<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandsRequest;
use App\Models\Commands;
use App\Models\Categorie;
use App\Models\Produit;
use App\Services\CommandeFormatter;   // ← import Pure Fabrication
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * GRASP Pure Fabrication — injection du formatter
     * Le contrôleur ne formate plus rien lui-même.
     */
    public function __construct(private CommandeFormatter $formatter) {}

    public function closeOrder($orderId)
    {
        return redirect()->back()
            ->with('success', 'La commande a été fermée avec succès.');
    }

    public function store(CommandsRequest $request)
    {
        if (empty($request->total_price) || is_null($request->total_price)) {
            return redirect()->back()
                ->withErrors(['total_price' => 'Le champ total_price ne peut être vide.']);
        }
        $commands = Commands::create($request->all());
        return redirect()->route('admin.caisse')
            ->with('success', 'Commande créée avec succès');
    }

    public function caisse()
    {
        $cmds       = Commands::where('status', 'Traité')->get();
        $categories = Categorie::all();
        $produits   = Produit::all();
        return view('admin.takeorder', compact('categories', 'produits', 'cmds'));
    }

    public function showCommandes()
    {
        $commandes = Commands::all();
        return view('admin.cuisiner', compact('commandes'));
    }

    /**
     * AVANT :
     *   foreach ($cmds as $command) {
     *       $command->randomId = Str::random(7); // formatage dans le contrôleur
     *   }
     *
     * APRÈS (Pure Fabrication) :
     *   Le formatter prend en charge tout le formatage.
     *   Le contrôleur ne fait que récupérer et passer à la vue.
     */
    public function index()
    {
        $cmds  = Commands::all();

        // Délégation complète au CommandeFormatter (Pure Fabrication)
        $cmds  = $this->formatter->formaterPourDashboard($cmds);
        $stats = $this->formatter->getStatistiques($cmds);

        return view('admin.ordres', compact('cmds', 'stats'));
    }

    public function updateStatus(Request $request)
    {
        $commande         = Commands::find($request->commande_id);
        $commande->status = $request->status;
        $commande->save();
        return redirect()->back()
            ->with('success', 'Status updated successfully');
    }

    /**
     * Export CSV des commandes — rendu possible par Pure Fabrication.
     * Cette fonctionnalité aurait alourdi le contrôleur sans le formatter.
     */
    public function exporterCSV()
    {
        $commandes = Commands::all();
        $csv       = $this->formatter->exporterCSV($commandes);

        return response($csv, 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="commandes.csv"',
        ]);
    }
}
