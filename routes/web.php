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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Projet
    Route::resource('project', ProjectController::class);

    //Requettes
    Route::resource('rse',RseController::class);

    //User
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    


});

require __DIR__.'/auth.php';
