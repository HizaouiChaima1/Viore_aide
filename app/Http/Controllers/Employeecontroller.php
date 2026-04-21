<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Models\Employe;
use App\Contracts\NotificationServiceInterface;
use App\Services\MenuService;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * SOLID: Dependency Inversion Principle (DIP)
     * 
     * Le contrôleur dépend des abstractions (NotificationServiceInterface)
     * et du service (MenuService) plutôt que d'implémentations concrètes.
     */
    private NotificationServiceInterface $notificationService;
    private MenuService $menuService;

    public function __construct(
        NotificationServiceInterface $notificationService,
        MenuService $menuService
    ) {
        $this->notificationService = $notificationService;
        $this->menuService = $menuService;
    }

    public function store(EmployeRequest $request)
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
    
        // SOLID DIP: utiliser le service de notification injecté
        $this->notificationService->sendEmployeeRegistrationEmail(
            $employe->Email,
            $request->input('password'), // Assurez-vous de ne pas envoyer le mot de passe haché
            $employe->Rôle
        );
    
        // Retour ou redirection après l'enregistrement
        return back()->with('success', 'Employé enregistré et email envoyé.');
    }
    
    public function index()
    {
        $currentUser = Auth::guard('employee')->user();
        $Employe = Employe::where('nomrestau', $currentUser->nomrestau)
                          ->where(function($query) use ($currentUser) {
                              $query->where('Rôle', '!=', 'admin')
                                    ->orWhere('id', $currentUser->id);
                          })
                          ->get();
        return view('admin.role', compact('Employe'));
    }

    public function affichemploye (){
        $currentUser = Auth::guard('employee')->user();
        $nomrestau = $currentUser->nomrestau;
        $Employes= Employe::withTrashed()
                          ->where('nomrestau', $nomrestau)
                          ->where(function($query) use ($currentUser) {
                              $query->where('Rôle', '!=', 'admin')
                                    ->orWhere('id', $currentUser->id);
                          })
                          ->get();
        $deletedemp= Employe::onlyTrashed()
                            ->where('nomrestau', $nomrestau)
                            ->where(function($query) use ($currentUser) {
                                $query->where('Rôle', '!=', 'admin')
                                      ->orWhere('id', $currentUser->id);
                            })
                            ->get();
        $tousemp = Employe::whereNull('deleted_at')
                          ->where('nomrestau', $nomrestau)
                          ->where(function($query) use ($currentUser) {
                              $query->where('Rôle', '!=', 'admin')
                                    ->orWhere('id', $currentUser->id);
                          })
                          ->get();
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
        // GoF: Facade — délègue au MenuService
        $this->menuService->softDelete($employe);
        return view('admin.detailcompte', compact('employe'));
    }
    public function statusemploye($id)
    {
        $employe= Employe::findOrFail($id); 

        // GoF: Strategy — délègue la logique de changement de statut au MenuService
        $this->menuService->toggleStatus($employe);

        return view('admin.detailcompte', compact('employe'));
    }
    public function restauremploye($id)
    {
        $employe= Employe::withTrashed()->findOrFail($id);
        // GoF: Facade — délègue au MenuService
        $this->menuService->restore($employe);
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