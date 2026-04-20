<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Models\Employe;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeRegistered;
use Illuminate\Support\Facades\Auth;
class EmployeeController extends Controller
{public function store(EmployeRequest $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'Nom' => 'required|string',
            'Email' => 'required|email|unique:employes,email',
            'numero_de_téléphone' => 'required|string',
            'Rôle' => 'required|string',
            'password' => 'required|string',
            'nomrestau' => 'required|string',
        ]);
    
        // Création de l'employé
        $employe = Employe::create([
            'Nom' => $request->input('Nom'),
            'Email' => $request->input('Email'),
            'numero_de_téléphone' => $request->input('numero_de_téléphone'),
            'Rôle' => $request->input('Rôle'),
            'password' => bcrypt($request->input('password')),
            'nomrestau' => $request->input('nomrestau'),
            'customerAddress1' => $request->input('customerAddress1'),
            'pays' => $request->input('pays'),
        ]);
    
        // Envoi de l'e-mail
        Mail::to($employe->Email)->send(new EmployeRegistered(
            $employe->Email,
            $request->input('password'), // Assurez-vous de ne pas envoyer le mot de passe haché
            $employe->Rôle
        ));
    
        // Retour ou redirection après l'enregistrement
        return back()->with('success', 'Employé enregistré et email envoyé.');
    }
    
    public function index()
    {
        $Employe = Employe::all();
        return view('admin.role', compact('Employe'));
    }

    public function affichemploye (){
        $Employes= Employe::withTrashed()->get();
        $deletedemp= Employe::onlyTrashed()->get();
        $tousemp = Employe::whereNull('deleted_at')->get();
        return view ('admin.ajout', compact('Employes','deletedemp','tousemp'));  
    }


    public function detailemploye($Id)
    {    
        $employe= Employe::withTrashed()->findOrFail((int)$Id);

        return view('admin.detailcompte', compact('employe'));
    }

    public function supemploye($id)
    {
        $employe= Employe::findOrFail($id);
        $employe->delete();
        return view('admin.detailcompte', compact('employe'));
    }
    public function statusemploye($id)
{
    $employe= Employe::findOrFail($id); 
if ($employe->status == 'Actif') {
    $employe->status = 'Inactif';
} elseif ($employe->status == 'Inactif') {
    $employe->status = 'Actif';
}
    $employe->save();
    return view('admin.detailcompte', compact('employe'));
}
public function restauremploye($id)
{
    $employe= Employe::withTrashed()->findOrFail($id);
    $employe->restore();
    return view('admin.detailcompte', compact('employe'));
}
public function modifemploye(EmployeRequest $request, $id)
{
    $employe = Employe::findOrFail($id);

    $employe->Nom = $request->input('Nom');
    $employe->Email = $request->input('Email');
    $employe->numero_de_téléphone = $request->input('numero_de_téléphone');
    $employe->Rôle = $request->input('Rôle');
    $employe->password = $request->input('password');

    $employe->save();
    return view('admin.detailcompte', compact('employe'));
}

}