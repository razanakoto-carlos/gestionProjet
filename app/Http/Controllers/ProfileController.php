<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('profile.index', compact('users'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(User $user): View
    {
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required | email | max:255 | unique:users,email,' . $id,
            'image_user' => 'nullable|image|mimes:jpg,jpeg,png|max:2024',
            'current_password' => 'nullable | current_password',
            'password' => 'nullable|confirmed|min:8',
        ]);



        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // $filePath = $request->file('image_user')->store('public/images');
        // $fileName = basename($filePath);  // Extract the filename


        if ($request->hasFile('image_user')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->image_user) {
                Storage::delete('images/' . $user->image_user);
            }


            // Télécharger la nouvelle image
            $fileName = time() . '.' . $request->file('image_user')->extension();
            $request->file('image_user')->storeAs('images', $fileName);

            // Mettre à jour le champ image_user dans la base de données
            $user->image_user = $fileName;
        }

        // if ($request->filled('current_password') && $request->filled('password')) {
        //     if (Hash::check($request->input('current_password'), $user->password)) {
        //         $user->password = hash::make($request->input('password'));
        //     } else {
        //         return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        //     }
        // }

        $user->save();

        return redirect()->route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
