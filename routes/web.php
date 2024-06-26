<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\consoController;
use App\Http\Controllers\AdminsController;

use App\Http\Controllers\AdminAgentController;
use App\Http\Controllers\AdminChartController;
use App\Http\Controllers\achatGroupController;
use App\Http\Controllers\AchatDirectController;
use App\Http\Controllers\AdminWalletController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\NotificationController;
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

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');
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

    Route::get('/produit/{id}', [userController::class, 'pubShow'])->name('produit.pubShow');

    Route::post('/produit/{id}', [userController::class, 'etat'])->name('produit.etat');


    Route::get('/consommation/{slug}', [userController::class, 'consoShow'])->name('consommation.consoShow');

    Route::post('/consommation/{id}', [userController::class, 'consoEtat'])->name('consommation.consoEtat');



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


//////   ////// PLATEFORME //////   ///////////



Route::middleware('user.auth')->prefix('biicf')->group(function () {
    Route::get('acceuil', [ProduitServiceController::class,  'homeBiicf'])->name('biicf.acceuil');
    Route::get('recheche', [ProduitServiceController::class, 'search'])->name('biicf.search');



    Route::get('notif', [NotificationController::class, 'index'])->name('biicf.notif');

    Route::get('api/notifications', [NotificationController::class, 'getNotifications'])->name('api.notifications');

    //accepter ou refuser la cmmande
    Route::post('notification/accepter', [AchatDirectController::class, 'accepter'])->name('achatD.accepter');
    Route::post('notification/refuser', [AchatDirectController::class, 'refuser'])->name('achatD.refuser');
    Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('notification.show');


    // routes/web.php
    Route::post('notification/acceptergroupe', [achatGroupController::class, 'accepter'])->name('achatG.accepter');
    Route::post('notification/refusergroupe', [achatGroupController::class, 'refuser'])->name('achatG.refuser');
    Route::get('publication', [ProduitServiceController::class, 'postBiicf'])->name('biicf.post');
    Route::post('publication/ajouter', [userController::class, 'storePub'])->name('biicf.pubstore');
    Route::delete('publication/supprimer/{produit}', [ProduitServiceController::class, 'destroyProductBiicf'])->name('biicf.pubdeleteBiicf');
    //la vue du formulaire
    Route::get('publication/{id}', [ProduitServiceController::class, 'pubDet'])->name('biicf.postdet');
    //pour passer ca commande
    Route::post('achatD/store/{id}', [AchatDirectController::class, 'store'])->name('achatD.store');
    //pour passer ca commande grouper
    Route::post('achatG/store/{id}', [achatGroupController::class, 'store'])->name('achatG.store');

    Route::get('consommation', [consoController::class, 'consoBiicf'])->name('biicf.conso');
    Route::post('consommation/ajouter', [userController::class, 'storeCons'])->name('biicf.storeCons');
    Route::delete('consommation/supprimer/{conso}', [consoController::class, 'destroConsom'])->name('biicf.consodelete');
    Route::get('consommation/{id}', [consoController::class, 'consoDet'])->name('biicf.consoDet');



    Route::get('porte-feuille', [AdminWalletController::class, 'indexBiicf'])->name('biicf.wallet');

    Route::post('envoyer-client', [AdminWalletController::class, 'sendToClientAccount'])->name('biicf.send');


    Route::get('profile', [userController::class, 'showProfile'])->name('biicf.showProfile');
    Route::put('/profile/profile-photo/{user}', [userController::class, 'updateProfilePhoto'])->name('biicf.updateProfilePhoto');
    Route::put('/profile/update/{user}', [userController::class, 'updateProfile'])->name('biicf.updateProfile');
    Route::put('/profile/password/{user}', [userController::class, 'updatePassword'])->name('biicf.updatePassword');
});

Route::get('biicf/login', [BiicfAuthController::class, 'showLoginForm'])->name('biicf.login');
Route::post('biicf/login', [BiicfAuthController::class, 'login']);

Route::get('biicf/signup', [UserController::class, 'createPageBiicf'])->name('biicf.signup');
Route::post('biicf/signup', [UserController::class, 'createUserBiicf']);

Route::post('biicf/logout', [BiicfAuthController::class, 'logout'])->name('biicf.logout');
