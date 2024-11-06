
@extends('layouts.app')

@section('title', 'Créer une Nouvelle Activité')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Ajouter une Nouvelle Activité</h1>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer l'Activité</button>
    </form>
</div>
@endsection
