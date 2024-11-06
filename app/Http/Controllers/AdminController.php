<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showAdminPage()
    {
        $users = User::paginate(10); // Affiche 10 utilisateurs par page
        $totalUsers = User::count();
        return view('admin', compact('users', 'totalUsers'));
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',

        ]);

        // Création de l'utilisateur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
        ]);

        return redirect()->route('admin.page')->with('success', 'Utilisateur ajouté avec succès!');
    }

    public function deleteUser($id)
    {
        // Trouver l'utilisateur par son ID et le supprimer
        $user = User::findOrFail($id);
        $user->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.page')->with('success', 'Utilisateur supprimé avec succès!');
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);

        // Mise à jour des informations de l'utilisateur
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
        ]);

        return redirect()->route('admin.page')->with('success', 'Informations de l\'utilisateur mises à jour avec succès!');
    }

    public function showUserProfile($id)
    {
        $user = User::findOrFail($id);
        return view('user-profile', compact('user'));
    }

    public function editUserProfile($id)
    {
        $user = User::findOrFail($id);
        return view('user-profile', compact('user'));
    }

    public function updateUserProfile(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);

        // Mise à jour des informations de l'utilisateur
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
        ]);

        return redirect()->route('admin.userProfile', $user->id)->with('success', 'Profil mis à jour avec succès !');
    }
}
