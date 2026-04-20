<?php
// Middleware personnalisé : AdminMiddleware.php
namespace App\Http\Middleware;
use App\Models\Employe;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'employé est authentifié
        $employe = Employe::find(Auth::guard('employe')->id());
        if ($employe) {
            // Vérifier si l'employé a le rôle d'administrateur
            if ($employe->Rôle === 'admin') {
                
            return redirect()->route('admin.index');// Laisser la requête continuer
            }
        }
        
        // Rediriger vers la page de connexion si l'employé n'est pas authentifié ou n'a pas le rôle d'administrateur
        return redirect()->route('admin.index');
    }
}
