<?php
namespace App\Http\Controllers\Auth;

use App\Models\Restaurant;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $restaurants = Restaurant::all();
    
        // Calculate the total number of restaurants
        $totalRestaurants = $restaurants->count();
    
        // Calculate the number of restaurants making requests each day
        $requestCountsByDay = DB::table('restaurants')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get()
            ->keyBy('date');
    
        foreach ($restaurants as $restaurant) {
            $restaurant->randomId = Str::random(7);
        }
    
        $request->authenticate();
        $request->session()->regenerate();
    
        session([
            'restaurants' => $restaurants,
            'totalRestaurants' => $totalRestaurants,
            'requestCountsByDay' => $requestCountsByDay,
        ]);
    
        return redirect()->route('home');
    }
    
    
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    /**
     * Show the restaurants view after login.
     */
    public function showRestaurants(): View
    {
        $restaurants = session('restaurants');
        $totalRestaurants = session('totalRestaurants');
        $requestCountsByDay = session('requestCountsByDay');
    
        return view('layouts.auth', compact('restaurants', 'totalRestaurants', 'requestCountsByDay'));
    }
    
}