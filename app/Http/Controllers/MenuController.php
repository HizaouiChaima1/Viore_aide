<?php

    namespace App\Http\Controllers;
    
    use App\Models\Categoriep;
    use App\Models\Categorie;
    use Illuminate\Http\Request;
    class MenuController extends Controller
    {
        public function create(){
            $Categoriep = Categoriep::all();
            return view('admin.menu', compact('Categoriep'));
        }
       
    
        public function showSubcategories($categoriep_id)
        {      $Categoriep = Categoriep::all();
            // Recherchez la catégorie principale correspondant à l'ID spécifié avec ses sous-catégories associées
                 $categorie = Categoriep::findOrFail($categoriep_id);
                  $sousCategories = $categorie->categories;
        
            // Passez la catégorie principale et ses sous-catégories à la vue
            return view('admin.menucat', compact('Categoriep', 'sousCategories'));
        }
        public function produit($categoriep_id)
        
        {         $Categoriep = Categoriep::all();
                 $Categorie = Categorie::all();
            // Recherchez la catégorie principale correspondant à l'ID spécifié avec ses sous-catégories associées
                 $produit = Categorie::findOrFail($categoriep_id);
                  $prod = $produit->produits;
        
            // Passez la catégorie principale et ses sous-catégories à la vue
            return view('admin.menuprod', compact('Categoriep', 'prod'));
        }
    }
    

