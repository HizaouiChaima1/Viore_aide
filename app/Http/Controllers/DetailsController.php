<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Services\Factories\ImageUploaderFactory;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    private ImageUploaderFactory $imageFactory;

    /**
     * GoF Factory Method — Client
     * Reçoit ProfileImageFactory via injection (AppServiceProvider).
     * Le contrôleur ne connaît pas le ConcreteCreator utilisé.
     */
    public function __construct(ImageUploaderFactory $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }

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

        // Factory Method — appel polymorphique via le Creator injecté
        $photoPath = $this->imageFactory->upload($request);
        if ($photoPath) {
            $admin->photo = $photoPath;
        }
        $admin->save();

        return redirect('/details')->with('success', 'Profil mis à jour avec succès.');
    }

    public function index()
    {
        $details = Employe::where('Rôle', 'admin')->first();
        return view('admin.profil', compact('details'));
    }

    public function indexx()
    {
        $details = Employe::where('Rôle', 'admin')->first();
        return view('admin.nav', compact('details'));
    }
}