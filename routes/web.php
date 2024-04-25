<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AddClientController;
use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\AdminChartController;
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
use App\Http\Controllers\AdminConsommationController;

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
    Route::delete('/agent/{admin}', [AdminAgentController::class, 'destroy'])->name('admin.agent.destroy');

    Route::delete('/users/{user}', [AdminClientController::class, 'destroyUser'])->name('admin.user.destroy');

    Route::delete('/produit/{produit}', [AdminProductsController::class, 'destroyProduct'])->name('admin.products.destroy');

    Route::delete('/services/{services}', [AdminServiceController::class, 'destroyService'])->name('admin.services.destroy');

    Route::delete('/conso-produit/{id}', [AdminConsprodController::class, 'destroyConsprod'])->name('admin.consprod.destroy');

    Route::delete('/conso-service/{id}', [AdminConsServController::class, 'destroyConsserv'])->name('admin.consserv.destroy');

    Route::put('/profile/update/{admin}', [AdminsController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::put('/profile/password/{admin}', [AdminsController::class, 'updatePassword'])->name('admin.updatePassword');
    
    Route::put('/profile/profile-photo/{admin}', [AdminsController::class, 'updateProfilePhoto'])->name('admin.updateProfilePhoto');



    Route::get('/ajouter-client', [AddClientController::class, 'create'])->name('clients.create');
    Route::post('/ajouter-client', [AddClientController::class, 'store'])->name('clients.store');
});

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

