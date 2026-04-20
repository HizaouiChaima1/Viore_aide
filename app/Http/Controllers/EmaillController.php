<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Mail\Email;
use App\Models\Restaurant;
use App\Models\Employe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
class EmaillController extends Controller
{
    public function create(EmployeRequest $request)
    {      
        $email = $request->input('Email');
        $password = $request->input('password');
        return view('emails.posted.exp', ['Email' => $email, 'password' => $password]);
    }
    public function EnvoyerEmail(EmployeRequest $request)
{
    $validatedData = $request->validate([
        'Email' => 'required|string|max:255',
        'password' => 'required|string|max:255'  ]);
    $restaurant = Restaurant::where('customerEmail', $request->input('Email'))->first();
    
    if ($restaurant) {
        $nom = $restaurant->customerName;
        $numero_de_telephone = $restaurant->customerContact;
        $adresse = $restaurant->customerAddress1;
        $pays = $restaurant->pays;

        // Enregistrer l'employé dans la base de données des employés
        $employe = Employe::create([
            'Nom' => $nom,
            'Email' => $request->input('Email'),
            'numero_de_téléphone' => $numero_de_telephone,
            'Rôle' => 'admin',
            'password' => bcrypt($request->input('password')),
            'nomrestau' => $restaurant->nomrestau,
            'customerAddress1' => $adresse,
            'pays' => $pays,
        ]);

        $email = $request->input('Email');
        $password = $request->input('password');
        Mail::to($email)->send(new Email($email, $password));
        
        // Mettre à jour le statut du restaurant
        $restaurant->status = 'activer';
        $restaurant->save();

        // Redirection vers une autre page après avoir soumis le formulaire
        return redirect('SlimsDigital/allcustomers');
    }else {
            // Si l'e-mail n'existe pas dans la base de données des restaurants, gérer l'erreur
            return redirect()->back()->with('error', 'L\'e-mail fourni n\'existe pas dans notre système.');
        }
    }
    public function inactiver($customerEmail)
    {      
        // Rechercher le restaurant par e-mail
        $restaurant = Restaurant::where('customerEmail', $customerEmail)->firstOrFail();
       
        // Mettre à jour le statut du restaurant
        $restaurant->status = 'inactiver';
        $restaurant->save();
    
        // Rediriger vers une autre page après avoir soumis le formulaire
        return redirect('SlimsDigital/allcustomers');
    }
    
    
}
