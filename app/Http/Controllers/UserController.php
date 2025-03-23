<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche le formulaire de création d'utilisateur
    public function create()
    {
        return view('create'); // Assure-toi que le fichier existe
    }

    // Stocke l'utilisateur (exemple basique)
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // Création de l'utilisateur
        \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ]);

        return redirect('/')->with('success', 'Utilisateur créé avec succès !');
    }
}
