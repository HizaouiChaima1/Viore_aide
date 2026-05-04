<?php

namespace App\Services;

use App\Contracts\NotificationServiceInterface;
use App\Mail\Email;
use App\Mail\EmployeRegistered;
use Illuminate\Support\Facades\Mail;

/**
 * SOLID: Dependency Inversion Principle (DIP)
 * 
 * Implémentation concrète du service de notification par email.
 * Encapsule les appels à Mail:: pour respecter le DIP.
 */
class EmailNotificationService implements NotificationServiceInterface
{
    /**
     * Envoie un email de bienvenue avec les identifiants du compte.
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function sendWelcomeEmail(string $email, string $password): void
    {
        Mail::to($email)->send(new Email($email, $password));
    }

    /**
     * Envoie un email d'enregistrement d'employé avec son rôle.
     *
     * @param string $email
     * @param string $password
     * @param string $role
     * @return void
     */
    public function sendEmployeeRegistrationEmail(string $email, string $password, string $role): void
    {
        Mail::to($email)->send(new EmployeRegistered($email, $password, $role));
    }
}
