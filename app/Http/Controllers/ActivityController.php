<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    // Afficher la liste des activités
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    // Afficher le formulaire de création d'activité
    public function create()
    {
        return view('activities.create');
    }

    // Enregistrer une nouvelle activité
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Activity::create($request->all());
        return redirect()->route('activities.index')->with('success', 'Activité ajoutée avec succès !');
    }

    // Afficher les détails d'une activité
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.show', compact('activity'));
    }

    // Afficher le formulaire d'édition d'une activité
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    // Mettre à jour une activité
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update($request->all());

        return redirect()->route('activities.index')->with('success', 'Activité mise à jour avec succès !');
    }

    // Supprimer une activité
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activité supprimée avec succès !');
    }
}
