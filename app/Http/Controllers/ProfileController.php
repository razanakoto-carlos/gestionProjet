<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;

    public function index(): View
    {
        $users = User::all();
        return view('profile.index', compact('users'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $this->authorize('isOwners', $user);
        $roles = Role::all();
        return view('profile.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user_auth = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required | email | max:255 | unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:8',
            'image_user' => 'nullable|image|mimes:jpg,jpeg,png|max:2024',
            'role_id' => 'nullable|exists:roles,id',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;

        if ($user_auth->role->name === 'DP') {
            $user->role_id = $request->role_id;
        }


        if ($request->hasFile('image_user')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->image_user && Storage::exists('images/' . $user->image_user)) {
                Storage::delete('images/' . $user->image_user);
            }
            // Télécharger la nouvelle image
            $fileName = time() . '.' . $request->file('image_user')->extension();
            $request->file('image_user')->storeAs('images', $fileName);
            // Mettre à jour le champ image_user dans la base de données
            $user->image_user = $fileName;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        notify()->success('Votre profil a été mis à jour avec succès!');
        return redirect()->route('profile.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user_auth = Auth::user();

        // Supprimer l'ancienne image si elle existe
        if ($user->image_user && Storage::exists('images/' . $user->image_user)) {
            Storage::delete('images/' . $user->image_user);
        }

        $id = (int)$id;
        if ($user_auth->id === $id) {
            Auth::logout();
            $user->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $user->delete();
        notify()->success('Votre profil a été supprimé avec succès.');
        return redirect()->route('profile.index');
    }
}
