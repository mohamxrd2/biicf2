<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AddClientController;
use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\AdminChartController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminWalletController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSettingController;
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
        'consommation' => AdminConsommationController::class,
        'profile' => AdminProfileController::class,
        'reglage' => AdminSettingController::class,
    ];

    foreach ($routes as $routeName => $controllerClass) {
        Route::get("/$routeName", [$controllerClass, 'index'])->name("admin.$routeName");
    }
    Route::post('/agent', [AdminAgentController::class, 'store'])->name('admin.agent.store');

    Route::get('/ajouter-client', [AddClientController::class, 'create'])->name('clients.create');
    Route::post('/ajouter-client', [AddClientController::class, 'store'])->name('clients.store');
   
});




Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Autres routes pour l'administration...
});

