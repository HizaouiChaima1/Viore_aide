<?php

namespace App\Services;

use App\Contracts\NotificationServiceInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

/**
 * EmailNotificationService
 *
 * Implémentation concrète de NotificationServiceInterface.
 * Responsable de l'envoi des emails de bienvenue et d'enregistrement
 * via le système de mail de Laravel.
 *
 * Design Pattern: Dependency Inversion (SOLID)
 * Le contrôleur dépend de l'interface, pas de cette classe concrète.
 */
class EmailNotificationService implements NotificationServiceInterface
{
    /**
     * Envoie un email de bienvenue avec les identifiants.
     *
     * @param string $email    L'adresse email du destinataire
     * @param string $password Le mot de passe en clair (avant hashage)
     * @return void
     */
    public function sendWelcomeEmail(string $email, string $password): void
    {
        try {
            Mail::send('emails.welcome', [
                'email'    => $email,
                'password' => $password,
            ], function ($message) use ($email) {
                $message->to($email)
                        ->subject('Bienvenue sur Viore Aide');
            });
        } catch (\Exception $e) {
            Log::error('EmailNotificationService::sendWelcomeEmail failed', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Envoie un email d'enregistrement d'employé.
     *
     * @param string $email    L'adresse email du destinataire
     * @param string $password Le mot de passe en clair
     * @param string $role     Le rôle attribué à l'employé
     * @return void
     */
    public function sendEmployeeRegistrationEmail(string $email, string $password, string $role): void
    {
        try {
            Mail::send('emails.employee_registration', [
                'email'    => $email,
                'password' => $password,
                'role'     => $role,
            ], function ($message) use ($email) {
                $message->to($email)
                        ->subject('Vos identifiants employé — Viore Aide');
            });
        } catch (\Exception $e) {
            Log::error('EmailNotificationService::sendEmployeeRegistrationEmail failed', [
                'email' => $email,
                'role'  => $role,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
