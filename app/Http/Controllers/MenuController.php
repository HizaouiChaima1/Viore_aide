<?php

namespace App\Http\Controllers;

use App\Repositories\ProduitRepositoryInterface;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Str;
use App\Composite\CategoriepComposite;
use App\Models\Categoriep;

/**
 * Patron Proxy — Client
 *
 * MenuController ne connaît que ProduitRepositoryInterface.
 * Il ne sait pas s'il parle au vrai repository ou au Proxy.
 * C'est le conteneur Laravel qui injecte le Proxy automatiquement.
 */
class MenuController extends Controller
{
    private ProduitRepositoryInterface $produitRepo;

    // Injection par constructeur — Laravel injecte le Proxy
    public function __construct(ProduitRepositoryInterface $produitRepo)
    {
        $this->produitRepo = $produitRepo;
    }

    public function create()
    {
        // ✅ Proxy : 1ère fois → requête DB | fois suivantes → cache mémoire
        $Categoriep = $this->produitRepo->getCategories();
        return view('admin.menu', compact('Categoriep'));
    }

    public function showSubcategories($categoriep_id)
    {
        $Categoriep = $this->produitRepo->getCategories();

        $categoriep   = Categoriep::findOrFail($categoriep_id);
        $sousCategories = $categoriep->categories; // relation hasMany vers Categorie

        return view('admin.menucat', compact('Categoriep', 'sousCategories'));
    }

    public function produit($categoriep_id)
    {
        // ✅ Proxy : retourne le cache — pas de nouvelle requête SQL
        $Categoriep = $this->produitRepo->getCategories();

        $produit = Categorie::findOrFail($categoriep_id);
        $prod    = $produit->produits;

        return view('admin.menuprod', compact('Categoriep', 'prod'));
    }

    /**
     * PROTOTYPE — Client
     * Le contrôleur demande au produit original de se cloner.
     * Il ne connaît pas les détails de la copie (UUID, SKU, nom).
     */
    public function dupliquerProduit(string $id)
    {
        // 1. Récupérer le produit original (le Prototype concret)
        $original = Produit::findOrFail($id);

        // 2. Demander au prototype de se cloner
        $clone = $original->cloner();

        // 3. Persister le clone en base
        $clone->save();

        return redirect()
            ->route('produit.show', $clone->id)
            ->with('success', 'Produit dupliqué avec succès. Pensez à modifier le nom et le SKU.');
    }

    /**
     * COMPOSITE — Client
     * Traite toute l'arborescence du menu de façon uniforme,
     * sans distinguer feuilles et nœuds.
     */
    public function resumeMenu(string $categoriep_id)
    {
        // Charger la catégorie principale avec ses enfants
        $categoriep = Categoriep::with('categories.produits')
            ->findOrFail($categoriep_id);

        // Construire l'arbre Composite
        $menuTree = new CategoriepComposite($categoriep);

        // Appels identiques peu importe le niveau de l'arbre
        $stats = [
            'nom'       => $menuTree->getNom(),
            'nbProduits' => $menuTree->getNombreProduits(),
            'prixTotal' => $menuTree->getPrixTotal(),
            'arbre'     => $menuTree->afficher(),
        ];

        return view('admin.menu-resume', compact('stats'));
    }
}
