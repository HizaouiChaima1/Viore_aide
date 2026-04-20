<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use Illuminate\Http\Request;
 // Assurez-vous d'importer le modèle Employe

class DetailsController extends Controller
{
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'nomrestau' => 'required|string|max:255',
            'numero_de_téléphone' => 'required|string|max:20',
            'customerAddress1' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = Employe::findOrFail($id);

        $admin->update([
            'Nom' => $validatedData['Nom'],
            'Email' => $validatedData['Email'],
            'nomrestau' => $validatedData['nomrestau'],
            'numero_de_téléphone' => $validatedData['numero_de_téléphone'],
            'customerAddress1' => $validatedData['customerAddress1'],
            'pays' => $validatedData['pays'],
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $photoPath = '/storage/' . $path;
            $admin->photo = $photoPath;
            $admin->save();
        }

        return redirect('/details')->with('success', 'Les détails de l\'employé admin ont été mis à jour avec succès.');
    }
    public function index()
{
    // Récupérer les détails de l'employé ayant le rôle "admin"
    $details = Employe::where('Rôle', 'admin')->first();
    
    // Passer les détails à la vue
    return view('admin.profil', compact('details'));             
}
public function indexx()
{
    // Récupérer les détails de l'employé ayant le rôle "admin"
    $details = Employe::where('Rôle', 'admin')->first();
    
    // Passer les détails à la vue
    return view('admin.nav', compact('details'));             
}

}
