<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthManager
{
    private $employee;

    public function __construct()
    {
        // On récupère l'employé connecté via le guard 'employee'
        $this->employee = Auth::guard('employee')->user();
    }

    /**
     * Vérifie si l'utilisateur est connecté.
     */
    public function check()
    {
        return !is_null($this->employee);
    }

    /**
     * Récupère l'objet employé.
     */
    public function employee()
    {
        return $this->employee;
    }

    /**
     * Vérifie le rôle de l'employé.
     */
    public function hasRole($role)
    {
        return $this->employee && $this->employee->Rôle === $role;
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isCaissier()
    {
        return $this->hasRole('Caissier');
    }

    public function isCuisinier()
    {
        return $this->hasRole('Cuisinier');
    }

    public function isServeur()
    {
        return $this->hasRole('Serveur');
    }

    /**
     * Récupère le nom du restaurant de l'employé.
     */
    public function getRestaurantName()
    {
        return $this->employee ? $this->employee->nomrestau : null;
    }
}
