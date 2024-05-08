<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AgentController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AddClientController;
use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\AdminChartController;
use App\Http\Controllers\biicf\UserController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminWalletController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminConsprodController;
use App\Http\Controllers\AdminConsServController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\BiicfAuthController;
use App\Http\Controllers\AdminConsommationController;
use App\Http\Controllers\auth\BicfAuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\biicf\ProduitServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    $routes = [
        'dashboard' => AdminDashboardController::class,
        'statistique' => AdminChartController::class,
        'porte-feuille' => AdminWalletController::class,
        'agent' => AdminAgentController::class,
        'client' => AdminClientController::class,
        'produits' => AdminProductsController::class,
        'services' => AdminServiceController::class,
        'conso-produit' => AdminConsprodController::class,
        'conso-service' => AdminConsServController::class,
        'profile' => AdminProfileController::class,
        'reglage' => AdminSettingController::class,
    ];

    foreach ($routes as $routeName => $controllerClass) {
        Route::get("/$routeName", [$controllerClass, 'index'])->name("admin.$routeName");
    }
    Route::post('/agent', [AdminAgentController::class, 'store'])->name('admin.agent.store');
    Route::post('/client/storePub', [AdminClientController::class, 'storePub'])->name('admin.client.storePub');
    Route::post('/client/storeCons', [AdminClientController::class, 'storeCons'])->name('admin.client.storeCons');


    Route::delete('/agent/{agent}', [AdminAgentController::class, 'destroy'])->name('admin.agent.destroy');
    Route::post('/agent/{admin}', [AdminAgentController::class, 'isban'])->name('admin.agent.isban');


    Route::delete('/users/{user}', [AdminClientController::class, 'destroyUser'])->name('admin.user.destroy');

    Route::delete('/produit/{produit}', [AdminProductsController::class, 'destroyProduct'])->name('admin.products.destroy');

    Route::delete('/services/{services}', [AdminServiceController::class, 'destroyService'])->name('admin.services.destroy');

    Route::delete('/conso-produit/{id}', [AdminConsprodController::class, 'destroyConsprod'])->name('admin.consprod.destroy');

    Route::delete('/conso-service/{id}', [AdminConsServController::class, 'destroyConsserv'])->name('admin.consserv.destroy');

    Route::put('/profile/update/{admin}', [AdminsController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::put('/profile/password/{admin}', [AdminsController::class, 'updatePassword'])->name('admin.updatePassword');

    Route::put('/profile/profile-photo/{admin}', [AdminsController::class, 'updateProfilePhoto'])->name('admin.updateProfilePhoto');

    Route::get('/agent/{username}', [AdminAgentController::class, 'show'])->name('agent.show');

    Route::get('/client/{username}', [AdminClientController::class, 'show'])->name('client.show');

    Route::get('/edit-agent/{username}', [AdminClientController::class, 'editAgent'])->name('client.editad');
    Route::post('/edit-agent/{username}', [AdminClientController::class, 'updateAdmin'])->name('update.admin');

    Route::post('/deposit', [AdminWalletController::class, 'deposit'])->name('wallet.deposit');

    Route::post('/recharge-agent', [AdminWalletController::class, 'rechargeAgentAccount'])->name('recharge.account');

    Route::post('/recharge-client', [AdminWalletController::class, 'rechargeClientAccount'])->name('recharge.clientaccount');

    //email
    Route::get('/email/verify', [VerificationController::class, 'verify'])->name('verification.verify');
    //success
   
   

    Route::get('/ajouter-client', [AdminClientController::class, 'create'])->name('clients.create');
    Route::post('/ajouter-client', [AdminClientController::class, 'store'])->name('clients.store');
});

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//////////// PLATEFORME ////////////////////




Route::prefix('biicf')->middleware('user.auth')->group(function () {
    Route::get('acceuil', function () {
        return view('biicf.acceuil');
    })->name('biicf.acceuil');

   
});
// Route pour afficher le formulaire de connexion
Route::get('biicf/login', [BiicfAuthController::class, 'showLoginForm'])->name('biicf.login');
// Route pour traiter la soumission du formulaire de connexion
Route::post('biicf/login', [BiicfAuthController::class, 'login']);
// Route pour afficher le formulaire d'inscription
Route::get('biicf/signup', [UserController::class, 'index'])->name('biicf.signup');

// Route pour traiter la soumission du formulaire d'inscription
Route::post('biicf/signup', [UserController::class, 'create'])->name('user.create');


Route::post('biicf/logout', [BiicfAuthController::class, 'logout'])->name('biicf.logout');
