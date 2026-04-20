<?php
namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function create(): View
    {
        return view('admin.loginadmin');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $employe = Employe::where('Email', $credentials['email'])->first();

        if (!$employe) {
            return redirect()->route('logine.create')->with('error', 'Adresse e-mail incorrecte.');
        }

        if (!Hash::check($credentials['password'], $employe->password)) {
            return redirect()->route('logine.create')->with('error', 'Mot de passe incorrect.');
        }

        Auth::guard('employee')->login($employe);

        $request->session()->regenerate();

        if ($employe->Rôle === 'admin') {
            $request->session()->put('Nom', $employe->Nom);
            $request->session()->put('nomrestau', $employe->nomrestau);
            $request->session()->put('Rôle', $employe->nomrestau);
            $request->session()->put('pays', $employe->pays);
            return redirect()->route('admin.index');
        } elseif ($employe->Rôle === 'Caissier') {
            return redirect()->route('admin.caisse');
        } elseif ($employe->Rôle === 'Cuisinier') {
            return redirect()->route('admin.cuisine');
        } elseif ($employe->Rôle === 'Serveur') {
            return redirect()->route('menu.create');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('logine.create');
    }
}
