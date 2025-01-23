@extends('layouts.admin')

@section('title', 'Mon Profil')

@section('header_title', 'Mon Profil')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Colonne de gauche - Informations du profil -->
        <div class="col-lg-8">
            <div class="card mb-4 profile-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-user-circle text-primary me-2"></i>
                        Informations du profil
                    </h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=4f46e5&color=fff" 
                             alt="Profile" 
                             class="rounded-circle profile-avatar"
                             width="120" 
                             height="120">
                        <h4 class="mt-3 mb-1">{{ Auth::user()->name }}</h4>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user text-primary me-2"></i>Nom
                                </label>
                                <input type="text" class="form-control custom-input" id="name" name="name" 
                                       value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <div class="text-danger mt-1">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope text-primary me-2"></i>Email
                                </label>
                                <input type="email" class="form-control custom-input" id="email" name="email" 
                                       value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="text-danger mt-1">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">
                                    <i class="fas fa-phone text-primary me-2"></i>Téléphone
                                </label>
                                <input type="tel" class="form-control custom-input" id="phone" name="phone" 
                                       value="{{ old('phone', $user->phone) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>Adresse
                                </label>
                                <input type="text" class="form-control custom-input" id="address" name="address" 
                                       value="{{ old('address', $user->address) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="postal_code" class="form-label">
                                    <i class="fas fa-map text-primary me-2"></i>Code postal
                                </label>
                                <input type="text" class="form-control custom-input" id="postal_code" name="postal_code" 
                                       value="{{ old('postal_code', $user->postal_code) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">
                                    <i class="fas fa-city text-primary me-2"></i>Ville
                                </label>
                                <input type="text" class="form-control custom-input" id="city" name="city" 
                                       value="{{ old('city', $user->city) }}">
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Sauvegarder les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Colonne de droite - Sécurité -->
        <div class="col-lg-4">
            <!-- Changer le mot de passe -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-lock text-primary me-2"></i>
                        Sécurité
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-key text-primary me-2"></i>Mot de passe actuel
                            </label>
                            <input type="password" class="form-control custom-input" id="current_password" 
                                   name="current_password" required>
                            @error('current_password')
                                <div class="text-danger mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock text-primary me-2"></i>Nouveau mot de passe
                            </label>
                            <input type="password" class="form-control custom-input" id="password" 
                                   name="password" required>
                            @error('password')
                                <div class="text-danger mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-check-circle text-primary me-2"></i>Confirmer le mot de passe
                            </label>
                            <input type="password" class="form-control custom-input" id="password_confirmation" 
                                   name="password_confirmation" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i>Changer le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Supprimer le compte -->
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Zone dangereuse
                    </h4>
                </div>
                <div class="card-body">
                    <p class="text-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Attention : cette action est irréversible. Toutes vos données seront définitivement supprimées.
                    </p>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">
                                <i class="fas fa-lock text-danger me-2"></i>Confirmez avec votre mot de passe
                            </label>
                            <input type="password" class="form-control custom-input" id="delete_password" 
                                   name="password" required>
                            @error('password')
                                <div class="text-danger mt-1">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Êtes-vous absolument sûr de vouloir supprimer votre compte ? Cette action est irréversible.')">
                                <i class="fas fa-trash-alt me-2"></i>Supprimer mon compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-card {
    border: none;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.profile-avatar {
    border: 4px solid #4f46e5;
    padding: 3px;
    box-shadow: 0 0 15px rgba(79, 70, 229, 0.3);
}

.custom-input {
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.custom-input:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.card {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e2e8f0;
    padding: 1.25rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #4f46e5;
    border-color: #4f46e5;
}

.btn-primary:hover {
    background-color: #4338ca;
    border-color: #4338ca;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
}

.btn-danger {
    background-color: #ef4444;
    border-color: #ef4444;
}

.btn-danger:hover {
    background-color: #dc2626;
    border-color: #dc2626;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
}

.text-primary {
    color: #4f46e5 !important;
}

.form-label {
    font-weight: 500;
    color: #1e293b;
}

@media (max-width: 768px) {
    .profile-avatar {
        width: 100px;
        height: 100px;
    }
}
</style>
@endsection
