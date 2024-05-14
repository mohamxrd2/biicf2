<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\consoController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\AdminChartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminWalletController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\BiicfAuthController;
use App\Http\Controllers\ProduitServiceController;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::prefix('admin')->middleware('admin.auth')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/statistique', [AdminChartController::class, 'index'])->name('admin.statistique');
    Route::get('/porte-feuille', [AdminWalletController::class, 'index'])->name('admin.porte-feuille');
    Route::get('/agent', [AdminAgentController::class, 'index'])->name('admin.agent');
    Route::get('/client', [userController::class, 'listUserAdmin'])->name('admin.client');
    Route::get('/produits', [ProduitServiceController::class, 'adminProduct'])->name('admin.produits');
    Route::get('/services', [ProduitServiceController::class, 'adminService'])->name('admin.services');
    Route::get('/consommation-produit', [consoController::class, 'adminConsProd'])->name('admin.conso-produit');

    Route::get('/consommation-service', [consoController::class, 'adminConsServ'])->name('admin.conso-service');

    Route::get('/profile', function(){return view('admin.profile');})->name('admin.profile');
    Route::get('/reglage', [AdminSettingController::class, 'index'])->name('admin.reglage');

    Route::post('/agent', [AdminAgentController::class, 'store'])->name('admin.agent.store');
    Route::post('/client/storePub', [userController::class, 'storePub'])->name('admin.client.storePub');
    Route::post('/client/storeCons', [userController::class, 'storeCons'])->name('admin.client.storeCons');

    Route::delete('/supprimer-agent', [AdminAgentController::class, 'destroy'])->name('admin.agent.destroy');


    Route::post('/agent/{admin}', [AdminAgentController::class, 'isban'])->name('admin.agent.isban');

    Route::delete('/users/{user}', [userController::class, 'destroyUser'])->name('admin.user.destroy');

    Route::delete('/produit/{produit}', [ProduitServiceController::class, 'destroyProduct'])->name('admin.products.destroy');

    Route::delete('/services/{services}', [ProduitServiceController::class, 'destroyService'])->name('admin.services.destroy');

    Route::delete('/consommation-produit/{id}', [consoController::class, 'destroyConsprod'])->name('admin.consprod.destroy');

    Route::delete('/consommation-service/{id}', [consoController::class, 'destroyConsserv'])->name('admin.consserv.destroy');

    Route::put('/profile/update/{admin}', [AdminsController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::put('/profile/password/{admin}', [AdminsController::class, 'updatePassword'])->name('admin.updatePassword');

    Route::put('/profile/profile-photo/{admin}', [AdminsController::class, 'updateProfilePhoto'])->name('admin.updateProfilePhoto');

    Route::get('/agent/{username}', [AdminAgentController::class, 'show'])->name('agent.show');

    Route::get('/client/{username}', [userController::class, 'show'])->name('client.show');

    Route::get('/produit/{slug}', [userController::class, 'pubShow'])->name('produit.pubShow');

    Route::post('/produit/{slug}', [userController::class, 'etat'])->name('produit.etat');



    Route::get('/edit-agent/{username}', [userController::class, 'editAgent'])->name('client.editad');
    Route::post('/edit-agent/{username}', [userController::class, 'updateAdmin'])->name('update.admin');

    Route::post('/deposit', [AdminWalletController::class, 'deposit'])->name('wallet.deposit');

    Route::post('/recharge-agent', [AdminWalletController::class, 'rechargeAgentAccount'])->name('recharge.account');

    Route::post('/recharge-client', [AdminWalletController::class, 'rechargeClientAccount'])->name('recharge.clientaccount');

    //email
    Route::get('/email/verify', [VerificationController::class, 'verify'])->name('verification.verify');
    //success
    Route::get('/ajouter-client', [userController::class, 'createPageAdmin'])->name('clients.create');
    Route::post('/ajouter-client', [userController::class, 'createUserAdmin'])->name('clients.store');
});

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


//////////// PLATEFORME ////////////////////




Route::middleware('user.auth')->prefix('biicf')->group(function () {
    Route::get('acceuil', function () {
        return view('biicf.acceuil');
    })->name('biicf.acceuil');

    Route::get('notif', function () {
        return view('biicf.notif');
    })->name('biicf.notif');

    Route::get('publication', function () {
        return view('biicf.post');
    })->name('biicf.post');

    Route::get('consommation', function () {
        return view('biicf.conso');
    })->name('biicf.conso');

    Route::get('porte-feuille', function () {
        return view('biicf.wallet');
    })->name('biicf.wallet');

    Route::get('profile', function () {
        return view('biicf.profile');
    })->name('biicf.profile');
});

Route::get('biicf/login', [BiicfAuthController::class, 'showLoginForm'])->name('biicf.login');
Route::post('biicf/login', [BiicfAuthController::class, 'login']);

Route::get('biicf/signup', [UserController::class, 'createPageBiicf'])->name('biicf.signup');
Route::post('biicf/signup', [UserController::class, 'createUserBiicf']);

Route::post('biicf/logout', [BiicfAuthController::class, 'logout'])->name('biicf.logout');

