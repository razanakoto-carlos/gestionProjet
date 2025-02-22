<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RseController;
use App\Models\Project;
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

    //User
    Route::resource('profile', ProfileController::class);

    //Requettes
    Route::resource('rse',RseController::class);
});

require __DIR__.'/auth.php';
