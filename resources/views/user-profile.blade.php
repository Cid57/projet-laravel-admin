@extends('layouts.app')

@section('title', 'Profil de l\'Utilisateur')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-center mb-4">Profil de l'Utilisateur</h1>
    <div class="card mt-4 shadow-lg" style="max-width: 600px; margin: auto; border-radius: 10px;">
        <div class="card-body p-4">
            <h5 class="card-title text-center mb-4">Détails de l'utilisateur</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nom : </strong>{{ $user->name }}</li>
                <li class="list-group-item"><strong>Email : </strong>{{ $user->email }}</li>
                <li class="list-group-item"><strong>Adresse : </strong>{{ $user->address ?? 'Non renseignée' }}</li>
                <li class="list-group-item"><strong>Code Postal : </strong>{{ $user->postal_code ?? 'Non renseigné' }}</li>
                <li class="list-group-item"><strong>Ville : </strong>{{ $user->city ?? 'Non renseignée' }}</li>
                <li class="list-group-item"><strong>Téléphone : </strong>{{ $user->phone ?? 'Non renseigné' }}</li>
                <li class="list-group-item"><strong>Date de Création : </strong>{{ $user->created_at->format('d/m/Y') }}</li>
            </ul>
            <div class="text-center mt-4">
                <a href="{{ route('admin.page') }}" class="btn btn-secondary px-4 py-2">Retour</a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Centrer le contenu et ajouter des marges */
    .container {
        max-width: 800px !important;
    }

    /* Style de la carte */
    .card {
        background-color: #ffffff !important;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1) !important;
        border: none !important;
        border-radius: 10px !important;
    }

    /* Style du titre */
    h1 {
        color: #333 !important;
        font-weight: bold !important;
    }

    /* Liste d'informations de l'utilisateur */
    .list-group-item {
        border: none !important;
        font-size: 1rem !important;
        padding: 12px 20px !important;
        color: #555 !important;
    }
    .list-group-item strong {
        color: #333 !important;
        font-weight: 600 !important;
    }

    /* Style du bouton "Retour" */
    .btn-secondary {
        background-color: #6c757d !important;
        border: none !important;
        font-size: 1rem !important;
        font-weight: bold !important;
        border-radius: 8px !important;
        transition: background-color 0.3s ease !important;
    }
    .btn-secondary:hover {
        background-color: #5a6268 !important;
    }

</style>
@endsection
