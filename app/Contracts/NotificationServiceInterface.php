<?php

namespace App\Contracts;


interface NotificationServiceInterface
{
    /**
     * Envoie un email de bienvenue avec les identifiants.
     *
     * @param string $email L'adresse email du destinataire
     * @param string $password Le mot de passe en clair (avant hashage)
     * @return void
     */
    public function sendWelcomeEmail(string $email, string $password): void;

    /**
     * Envoie un email d'enregistrement d'employé.
     *
     * @param string $email L'adresse email du destinataire
     * @param string $password Le mot de passe en clair
     * @param string $role Le rôle attribué à l'employé
     * @return void
     */
    public function sendEmployeeRegistrationEmail(string $email, string $password, string $role): void;
}
