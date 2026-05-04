<?php
// Middleware personnalisé : AdminMiddleware.php
namespace App\Http\Middleware;

use App\Services\AuthManager;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    private AuthManager $authManager;

    // Injection via constructeur — Laravel résout l'instance Singleton automatiquement
    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    public function handle(Request $request, Closure $next)
    {
        // Singleton Pattern: une seule instance d'AuthManager est utilisée
        if ($this->authManager->check() && $this->authManager->isAdmin()) {
            return $next($request); // Laisser la requête continuer
        }

        // Rediriger vers login si non authentifié ou pas admin
        return redirect()->route('logine.create')
            ->with('error', 'Accès réservé aux administrateurs.');
    }
}
