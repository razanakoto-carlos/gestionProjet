<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RpmController;
use App\Http\Controllers\RseController;
use App\Http\Controllers\RsenvController;
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
});

require __DIR__.'/auth.php';
