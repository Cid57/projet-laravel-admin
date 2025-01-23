@extends('layouts.app')

@section('title', 'Profil de l\'Utilisateur')

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="container">
    <h1 class="display-4">Profil de l'Utilisateur</h1>
    <p class="text-center text-muted">Consultez et modifiez les informations de cet utilisateur</p>
    
    <div class="card mt-4">
        <div class="card-body">

            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Nom :</strong>
                    <span>{{ $user->name }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Email :</strong>
                    <span>{{ $user->email }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Adresse :</strong>
                    <span>{{ $user->address ?? 'Non renseignée' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Code Postal :</strong>
                    <span>{{ $user->postal_code ?? 'Non renseigné' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Ville :</strong>
                    <span>{{ $user->city ?? 'Non renseignée' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Téléphone :</strong>
                    <span>{{ $user->phone ?? 'Non renseigné' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Date de Création :</strong>
                    <span>{{ $user->created_at->format('d/m/Y') }}</span>
                </li>
            </ul>
            <div class="text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</div>


<style>



/* ====== SOUS-TITRE ====== */
/* ====== TITRE PRINCIPAL ====== */
h1.display-4 {
    font-size: 2.8rem; /* Légèrement plus grand */
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;
    background: linear-gradient(90deg, #4a90e2, #6a11cb); /* Dégradé moderne */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; /* Texte dégradé */
    position: relative;
}

/* Ligne décorative sous le titre */
h1.display-4::after {
    content: "";
    display: block;
    width: 80px;
    height: 5px;
    background: #4a90e2; /* Même bleu que le dégradé */
    margin: 10px auto 0;
    border-radius: 2px;
}

/* ====== SOUS-TITRE ====== */
.text-muted {
    font-size: 1.1rem;
    color: #6c757d; /* Gris clair subtil */
    margin-top: -10px;
    text-align: center;
    font-style: italic; /* Ajout d'un effet élégant */
}



.container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
}

/* ======= CARD STYLES ======= */
.card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border: none;
}

.card-body {
    padding: 30px 40px;
}



/* ======= USER DETAILS ======= */
.list-group {
    margin: 20px 0;
}

.list-group-item {
    border: none;
    font-size: 1rem;
    padding: 12px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #555;
}

.list-group-item strong {
    color: #4a90e2;
    font-weight: 600;
}

.list-group-item:nth-child(odd) {
    background-color: #f9f9f9;
}

.list-group-item:nth-child(even) {
    background-color: #ffffff;
}

/* ======= BUTTON STYLES ======= */
.btn-secondary {
    background-color: #4a90e2;
    color: white;
    font-size: 1rem;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background-color: #357abd;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

.text-center {
    margin-top: 30px;
}

</style>
@endsection
