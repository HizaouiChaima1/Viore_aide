<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bornController;
use App\Http\Controllers\CompteRestaurantController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\EmaillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\DashboardController;


use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\NotificationControllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/marquer_notification_lue/{id}', [NotificationControllers::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/dash', [DashboardController::class, 'index'])->name('dash');

Route::post('/caisse', [CaisseController::class, 'add'])->name('caisse.add');
Route::post('/caisse1', [CaisseController::class, 'save'])->name('caisse.save');

Route::get('/ordres', [OrdersController::class, 'index'])->name('admin.index');
Route::get('SlimsDigital/logine', [AdminController::class, 'create'])->name('logine.create');
Route::get('/logine', function () {
    return view('admin.loginadmin');
});
Route::get('/ordre', [OrdersController::class, 'caisse'])->name('admin.caisse');
Route::get('/cuisine', [OrdersController::class, 'cuisine'])->name('admin.cuisine');

Route::get('/edit', function () {
    return view('admin.editprofil');
});


Route::get('/reset', function () {
    return view('auth.reset-password');
});
Route::get('/home', function () {
    return view('admin.sidebar');
});

Route::get('/caisse', function () {
    return view('admin.caisse');
});
Route::get('/ajouter', function () {
    return view('admin.ajout');
});
Route::get('/categoriep', function () {
    return view('admin.categoriep');
});

Route::get('/p', function () {
    return view('admin.p');
});

Route::get('/menud', [MenuController::class, 'index'])->name('menud.index');

Route::post('/addToCart', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/commande', [CartController::class, 'save'])->name('save.command');

Route::get('/menu', [MenuController::class, 'create'])->name('menu.create');
Route::get('/menu/{id}', [MenuController::class, 'showSubcategories'])->name('subcategories.show');
Route::get('/menu1/{id}', [MenuController::class, 'produit'])->name('subcategories.produit');
Route::post('/nouveaucategoriep', [CompteRestaurantController::class, 'storep'])->name('catégorie.storep');
Route::get('/nouveaucategoriep', [CompteRestaurantController::class, 'indexp'])->name('catégorie.indexp');
Route::post('/nouveaucategorie', [CompteRestaurantController::class, 'store'])->name('catégorie.store');
Route::get('/nouveaucategorie', [CompteRestaurantController::class, 'index'])->name('catégorie.index');
Route::post('/nouveauproduit', [CompteRestaurantController::class, 'ajout'])->name('produit.ajout');
Route::get('/nouveauproduit', [CompteRestaurantController::class, 'indexx'])->name('produit.index');
Route::post('/ordre', [OrdersController::class, 'store'])->name('admin.store');
Route::post('/role', [EmployeeController::class, 'store'])->name('employe.store');
Route::get('/employe', [EmployeeController::class, 'index'])->name('employe.index');


// Dans votre fichier web.php
Route::put('/details/{id}', [DetailsController::class, 'store'])->name('details.store');


Route::get('/details', [DetailsController::class, 'index'])->name('details.index');
Route::post('/logine', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/', function () {
    return view('welcome'); // replace [view.name] with 'welcome'
});
Route::get('/restaurant', function () {
    return view('restaurant.index');
});

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [AuthenticatedSessionController::class, 'showRestaurants'])->name('home');

Route::post('/notifications/markAsRead/{id}', [NotificationControllers::class, 'markAsRead'])->name('notifications.markAsRead');
Route::post('/notifications/markAllAsRead', [NotificationControllers::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
Route::post('/close-order/{orderId}', [OrdersController::class, 'closeOrder'])->name('close.order');

Route::get('SlimsDigital/Partenariat', [RestaurantController::class, 'create'])->name('restaurant.create');
Route::post('SlimsDigital/Partenariat', [RestaurantController::class, 'store'])->name('restaurant.store');
Route::get('SlimsDigital/allcustomers', [RestaurantController::class, 'index'])->name('restaurant.index');

Route::post('/email', [EmaillController::class, 'EnvoyerEmail'])->name('Email.envoyeremail');
Route::get('inactiver/{customerEmail}', [EmaillController::class, 'inactiver']);

Route::get('SlimsDigital/sucess', function () {
    return view('restaurant.alert');
})->name('alert');

Route::post('logout1', [AdminController::class, 'destroy'])
    ->name('logout1');

require __DIR__ . '/auth.php';



Route::post('/mark-all-notifications-as-read', [NotificationControllers::class, 'markAllNotificationsAsRead'])->name('notifications.markAllAsRead');
Route::get('/cuisine', [OrdersController::class, 'showCommandes'])->name('admin.cuisine');
Route::post('/update-order-status', [OrdersController::class, 'updateStatus'])->name('update.order.status');
Route::post('/notifications/markAsRead/{id}', [NotificationControllers::class, 'markAsRead'])->name('notifications.markAsRead');
Route::post('/notifications/markAllAsRead', [NotificationControllers::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
Route::post('/close-order/{orderId}', [OrdersController::class, 'closeOrder'])->name('close.order');





Route::post('/restaurantadd', [RestaurantController::class, 'add'])->name('restaurant.add');



Route::get('/employes/{employe}', [EmployeeController::class, 'detailemploye'])->name('employe.detail');
Route::delete('/employe/delete/{id}', [EmployeeController::class, 'supemploye'])->name('employe.sup');
Route::put('/employe/status/{id}', [EmployeeController::class, 'statusemploye'])->name('employe.status');
Route::put('/employe/restore/{id}', [EmployeeController::class, 'restauremploye'])->name('employe.restauremploye');
Route::put('/employe/{employe}', [EmployeeController::class, 'modifemploye'])->name('employe.modif');


Route::get('/produits/{produit}', [CompteRestaurantController::class, 'detailproduit'])->name('produit.detail');
Route::put('/produit/modif/{id}', [CompteRestaurantController::class, 'modifproduit'])->name('produit.modif');
Route::put('/produit/status/{id}', [CompteRestaurantController::class, 'updateStatus'])->name('produit.statut');
Route::delete('/produit/delete/{id}', [CompteRestaurantController::class, 'supproduit'])->name('produit.sup');
Route::put('/produit/restore/{id}', [CompteRestaurantController::class, 'restaureproduit'])->name('produit.restaureproduit');


Route::get('/combos/{combos}', [CompteRestaurantController::class, 'detailcombos'])->name('combos.detail');
Route::post('/combos', [CompteRestaurantController::class, 'ajoutcombos'])->name('combos.ajout');
Route::get('/nouvelcombos', [CompteRestaurantController::class, 'affichcombos'])->name('combos.affich');
Route::put('/combos/{combos}', [CompteRestaurantController::class, 'modifcombos'])->name('combos.modif');
Route::delete('/combos/suprime/{id}', [CompteRestaurantController::class, 'supcombos'])->name('combos.sup');
Route::put('/combos/status/{id}', [CompteRestaurantController::class, 'Statuscombos'])->name('combos.statut');
Route::put('/combos/restore/{id}', [CompteRestaurantController::class, 'restaurecombos'])->name('combos.restaurecombos');





Route::post('/cartefidelite', [CompteRestaurantController::class, 'ajoutcarte'])->name('cartefidelite.ajout');
Route::get('/nouvelcarte', [CompteRestaurantController::class, 'affichcarte'])->name('cartefidelite.affich');
Route::get('/carte/{carte}', [CompteRestaurantController::class, 'detailcarte'])->name('carte.detail');
Route::delete('/carte/delete/{id}', [CompteRestaurantController::class, 'supcarte'])->name('carte.sup');
Route::put('/carte/status/{id}', [CompteRestaurantController::class, 'Statuscarte'])->name('carte.status');
Route::put('/carte/restore/{id}', [CompteRestaurantController::class, 'restaurecarte'])->name('carte.restaurecarte');
Route::put('/carte/modif/{id}', [CompteRestaurantController::class, 'modifcarte'])->name('carte.modifier');





Route::post('/modif', [CompteRestaurantController::class, 'ajoutmodif'])->name('modif.ajout');
Route::get('/nouvelmodif', [CompteRestaurantController::class, 'affichemodif'])->name('modif.affich');
Route::delete('/modif/{modif}', [CompteRestaurantController::class, 'effacemodif'])->name('modif.efface');
Route::put('/modif/restore/{modif}', [CompteRestaurantController::class, 'restoremodif'])->name('modif.restore');
Route::put('/modif/{modif}', [CompteRestaurantController::class, 'modifmodif'])->name('modif.modif');




Route::post('/optionmodif', [CompteRestaurantController::class, 'ajoutoption'])->name('optionmodif.ajout');
Route::get('/nouveloption', [CompteRestaurantController::class, 'afficheoption'])->name('optionmodif.affich');
Route::get('/options/{option}', [CompteRestaurantController::class, 'detailoption'])->name('option.detail');
Route::put('/option/modif/{id}', [CompteRestaurantController::class, 'modifoption'])->name('option.modif');
Route::put('/option/status/{id}', [CompteRestaurantController::class, 'Statusoption'])->name('option.status');
Route::delete('/option/delete/{id}', [CompteRestaurantController::class, 'supoption'])->name('option.sup');
Route::put('/option/restore/{id}', [CompteRestaurantController::class, 'restaureoption'])->name('option.restaureoption');





Route::delete('/categoriesp/{categoriep}', [CompteRestaurantController::class, 'deletecp'])->name('categoriesp.delete');
Route::put('/categoriesp/restore/{categoriep}', [CompteRestaurantController::class, 'restorecp'])->name('categoriesp.restore');
Route::put('/categoriesp/modifier/{categoriep}', [CompteRestaurantController::class, 'modifiercp'])->name('categoriesp.modifier');


Route::delete('/categories/{categorie}', [CompteRestaurantController::class, 'delete'])->name('categories.delete');
Route::put('/categories/restore/{categorie}', [CompteRestaurantController::class, 'restore'])->name('categories.restore');
Route::put('/categories/modifier/{categorie}', [CompteRestaurantController::class, 'modifier'])->name('categories.modifier');






Route::get('/detailarticle', [CompteRestaurantController::class, 'ajoutarticle'])->name('article.ajout');
Route::get('/articleaffich', [CompteRestaurantController::class, 'afficharticle'])->name('article.back');
Route::get('/articles/{article}', [CompteRestaurantController::class, 'detailarticle'])->name('article.detail');
Route::put('/articles/modif/{id}', [CompteRestaurantController::class, 'modifarticle'])->name('article.modif');
Route::delete('/articles/suprime/{id}', [CompteRestaurantController::class, 'suparticle'])->name('article.sup');
Route::put('/articles/restore/{id}', [CompteRestaurantController::class, 'restaurearticle'])->name('article.restaurearticle');



Route::post('/fournisseur', [CompteRestaurantController::class, 'ajoutfournisseur'])->name('fournisseur.ajout');
Route::get('/nouvelfournisseur', [CompteRestaurantController::class, 'affichfournisseur'])->name('fournisseur.affich');
Route::get('/fournisseurs/{fournisseur}', [CompteRestaurantController::class, 'show'])->name('fourni.detail');
Route::put('/fournisseurs/modif/{id}', [CompteRestaurantController::class, 'modiffourni'])->name('fourni.modif');
Route::delete('/fournisseurs/suprime/{id}', [CompteRestaurantController::class, 'supfourni'])->name('fourni.sup');
Route::put('/fournisseurs/restore/{id}', [CompteRestaurantController::class, 'restaurefourni'])->name('fourni.restaurefourni');



Route::post('/ordredachat', [CompteRestaurantController::class, 'ajoutordre'])->name('ordre.ajout');
Route::get('/nouvelordre', [CompteRestaurantController::class, 'affichordre'])->name('ordre.affich');

Route::get('/nouvelemploye', [EmployeeController::class, 'affichemploye'])->name('employe.affich');



Route::post('/branche', [CompteRestaurantController::class, 'ajoutbranche'])->name('branche.ajout');
Route::get('/nouvelbranche', [CompteRestaurantController::class, 'affichebranche'])->name('branche.affich');
Route::get('/branche/{branche}', [CompteRestaurantController::class, 'detailbranche'])->name('branche.detail');
Route::put('/branche/modif/{branche}', [CompteRestaurantController::class, 'modifbranche'])->name('branche.modif');



Route::post('/ajoutfourniarticle', [CompteRestaurantController::class, 'ajoutfourniarticle'])->name('ajoutfourniarticle');



Route::post('/reduction', [CompteRestaurantController::class, 'ajoutreduction'])->name('reduction.ajout');
Route::get('/nouvelreduction', [CompteRestaurantController::class, 'affichereduction'])->name('reduction.affich');
Route::get('/reductions/{reduction}', [CompteRestaurantController::class, 'detailreduction'])->name('reduction.detail');
Route::put('/reductions/modif/{reduction}', [CompteRestaurantController::class, 'modifreduction'])->name('reduction.modif');
Route::delete('/reductions/suprime/{id}', [CompteRestaurantController::class, 'supreduction'])->name('reduction.sup');
Route::put('/reductions/restore/{id}', [CompteRestaurantController::class, 'restaurereduction'])->name('reduction.restaurereduction');


Route::post('/article/modif/{article}', [CompteRestaurantController::class, 'ajoutFourniArticle'])->name('ajoutfourniarticle');
Route::post('/produit/{id}/dupliquer', [MenuController::class, 'dupliquerProduit'])
    ->name('produit.dupliquer');
Route::post('/combos/{id}/dupliquer', [MenuController::class, 'dupliquerCombo'])->name('combo.dupliquer');

