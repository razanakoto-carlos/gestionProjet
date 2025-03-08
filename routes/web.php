<?php

use App\Http\Controllers\CaPaiementController;
use App\Http\Controllers\CpController;
use App\Http\Controllers\CpPaiementController;
use App\Http\Controllers\CptPaiementController;
use App\Http\Controllers\DpController;
use App\Http\Controllers\pdfRequetteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RafController;
use App\Http\Controllers\RafPaiementController;
use App\Http\Controllers\RaiController;
use App\Http\Controllers\RaiPaiementController;
use App\Http\Controllers\RpmController;
use App\Http\Controllers\RpmPaiementController;
use App\Http\Controllers\RseController;
use App\Http\Controllers\RsenvController;
use App\Http\Controllers\RsePaiementController;
use App\Models\Dp;
use App\Models\Project;
use App\Models\Rsenv;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $projects = Project::all();
    return view('dashboard', compact('projects'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Projet
    Route::resource('project', ProjectController::class);
    Route::get('/search', [ProjectController::class , 'search']);

    //User
    Route::resource('profile', ProfileController::class);

    //Requettes
    Route::resource('rse', RseController::class);
    Route::get('/search_rse', [RseController::class , 'search']);

    Route::resource('rsenv', RsenvController::class);
    Route::get('/search_rsenv', [RsenvController::class , 'search']);

    Route::resource('rpm', RpmController::class);
    Route::get('/search_rpm', [RpmController::class , 'search']);

    Route::resource('raf', RafController::class);
    Route::get('/search_raf', [RafController::class , 'search']);

    Route::resource('rai', RaiController::class);
    Route::get('/search_rai', [RaiController::class , 'search']);

    Route::resource('cp', CpController::class);
    Route::get('/search_cp', [CpController::class , 'search']);

    Route::resource('dp', DpController::class);
    Route::get('/search_dp', [DpController::class , 'search']);

    //Paiements
    Route::resource('rsePaiement', RsePaiementController::class);
    Route::get('/search_rse_paiement', [RsePaiementController::class , 'search']);

    Route::resource('cptPaiement', CptPaiementController::class);
    Route::get('/search_rsenv_paiement', [CptPaiementController::class , 'search']);

    Route::resource('rpmPaiement', RpmPaiementController::class);
    Route::get('/search_rpm_paiement', [RpmPaiementController::class , 'search']);

    Route::resource('rafPaiement', RafPaiementController::class);
    Route::get('/search_raf_paiement', [RafPaiementController::class , 'search']);

    Route::resource('raiPaiement', RaiPaiementController::class);
    Route::get('/search_rai_paiement', [RaiPaiementController::class , 'search']);

    Route::resource('cpPaiement', CpPaiementController::class);
    Route::get('/search_cp_paiement', [CpPaiementController::class , 'search']);

    Route::resource('caPaiement', CaPaiementController::class);
    Route::get('/search_dp_paiement', [CaPaiementController::class , 'search']);

    //pdf
    Route::get('/pdfRequette/{id}', [pdfRequetteController::class, 'pdf'])->name('pdfRequette');
    Route::get('/pdfRequette/exporter/{id}', [pdfRequetteController::class, 'generatePDF'])->name('pdfRequette.exporter');

});

require __DIR__.'/auth.php';
