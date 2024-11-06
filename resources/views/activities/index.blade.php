@extends('layouts.app')
<style>
    /* Boutons stylisés */
.btn-primary,
.btn-secondary {
    background-color: #4a90e2 !important;
    border-color: #4a90e2 !important;
    font-weight: bold !important;
    color: white !important;
    border-radius: 30px !important;
    padding: 10px 20px !important;
    transition: background-color 0.3s, box-shadow 0.3s;
}
.btn-primary:hover,
.btn-secondary:hover {
    background-color: #357abd !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important;
}
</style>
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Suivi des Activités</h1>
    <a href="{{ route('activities.create') }}" class="btn btn-primary">Ajouter une Activité</a>
    <button class="btn btn-secondary" onclick="window.location.href='{{ route('home') }}'">
        <i class="fas fa-home me-2"></i> Retour à l'accueil
    </button>

    <div class="card mt-4 shadow">
        <div class="card-header bg-primary text-white">
            Liste des Activités
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->date }}</td>
                        <td>
                            <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
