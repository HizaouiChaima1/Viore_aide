<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Services\RestaurantRegistrationFacade;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct(private RestaurantRegistrationFacade $restaurantRegistrationFacade)
    {
    }

     
    public function create()
    {
        return view('restaurant.create');
    }
    public function create1()
    {
        return view('restaurant.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customerName' => 'required|string|max:255',
            'nomrestau' => 'required|string|max:255',
            'customerContact' => 'required|string|max:15',
            'customerEmail' => 'required|email|max:255',
            'customerAddress1' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
        ]);
        $email = $request->input('customerEmail');
    
        $existingRestaurant = Restaurant::where('customerEmail', $email)->first();
        if ($existingRestaurant) {
          
            session()->flash('msg', 'L\'e-mail existe déjà.');
            // Rediriger l'utilisateur vers une page appropriée, par exemple, la page de création du restaurant
            return redirect()->route('restaurant.create')->withInput();
        }
    
        $restaurant = $this->restaurantRegistrationFacade->register($validatedData);
        // Si vous souhaitez afficher un message de succès, vous pouvez le stocker dans la session ici
        session()->flash('success', 'Restaurant enregistré avec succès.');
        
        // Rediriger vers une vue appropriée
        return view('restaurant.alert');
    }
    public function index()
{
    $restaurants = Restaurant::all();
    
    // Récupérez les e-mails de la session ou initialisez un tableau vide
    $emails = session()->get('emails', []);

    foreach ($restaurants as $restaurant) {
        // Vérifiez si l'e-mail du restaurant n'est pas déjà stocké dans la session
        if (!isset($emails[$restaurant->id])) {
            // Si non, stockez-le dans la session
            $emails[$restaurant->id] = $restaurant->Email; // Assurez-vous d'utiliser la bonne clé pour l'e-mail
        }
    }

    // Mettez à jour la session avec les nouveaux e-mails
    session()->put('emails', $emails);

    return view('restaurant.index', compact('restaurants'));
}

public function add(Request $request)
{
    $validatedData = $request->validate([
        'customerName' => 'required|string|max:255',
        'nomrestau' => 'required|string|max:255',
        'customerContact' => 'required|string|max:15',
        'customerEmail' => 'required|email|max:255',
        'customerAddress1' => 'required|string|max:255',
        'pays' => 'required|string|max:255',
    ]);
    $email = $request->input('customerEmail');

    $existingRestaurant = Restaurant::where('customerEmail', $email)->first();
    if ($existingRestaurant) {
      
        session()->flash('msg', 'L\'e-mail existe déjà.');
        // Rediriger l'utilisateur vers une page appropriée, par exemple, la page de création du restaurant
        return redirect()->route('restaurant.create')->withInput();
    }

    $restaurant = $this->restaurantRegistrationFacade->registerWithoutNotification($validatedData);
    
    
    // Si vous souhaitez afficher un message de succès, vous pouvez le stocker dans la session ici
    session()->flash('success', 'Restaurant enregistré avec succès.');
    $restaurants = Restaurant::all();
    // Rediriger vers une vue appropriée
    return view('restaurant.index', compact('restaurants'));
}

}
