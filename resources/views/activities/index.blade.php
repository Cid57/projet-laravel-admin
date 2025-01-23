@extends('layouts.app')

@section('title', 'Suivi des Activités')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Suivi des Activités</h1>

    <a href="{{ route('activities.create') }}" class="btn btn-primary mb-3">Ajouter une Activité</a>

    <!-- Bouton de retour à l'accueil -->
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Retour à l'accueil</a>


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
                        <!-- Bouton Supprimer avec fonction confirmDelete -->
                        <button onclick="confirmDelete({{ $activity->id }})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteActivityModal">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de Confirmation de Suppression -->
<div class="modal fade" id="deleteActivityModal" tabindex="-1" aria-labelledby="deleteActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteActivityModalLabel">Confirmer la Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette activité ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteActivityForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(activityId) {
        const form = document.getElementById('deleteActivityForm');
        if (form) {
            form.action = `/activities/${activityId}`; // Définir l'URL pour la suppression de l'activité
            $('#deleteActivityModal').modal('show'); // Ouvrir la modale
        } else {
            console.error("Le formulaire de suppression n'a pas été trouvé.");
        }
    }
</script>

@endsection
