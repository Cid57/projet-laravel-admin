@extends('layouts.admin')

@section('title', 'Tableau de Bord Admin')

@section('header_title', 'Tableau de Bord')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-blue-500 p-3">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Total Utilisateurs</h3>
                    <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-green-500 p-3">
                    <i class="fas fa-calendar-check text-white text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Activités Actives</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-yellow-500 p-3">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">En attente</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-red-500 p-3">
                    <i class="fas fa-exclamation-circle text-white text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Alertes</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Gestion des Utilisateurs</h2>
            <button onclick="openAddUserModal()" class="btn-custom bg-blue-500 text-white hover:bg-blue-600">
                <i class="fas fa-plus mr-2"></i> Ajouter un Utilisateur
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="custom-table w-full">
                <thead>
                    <tr>
                        <th class="text-left">Nom</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">Téléphone</th>
                        <th class="text-left">Ville</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? 'Non renseigné' }}</td>
                        <td>{{ $user->city ?? 'Non renseigné' }}</td>
                        <td class="text-center">
                            <button onclick="openEditUserModal({{ $user->id }})" class="btn-custom bg-yellow-500 text-white hover:bg-yellow-600">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteUserModal({{ $user->id }})" class="btn-custom bg-red-500 text-white hover:bg-red-600 ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Modals -->
    @include('components.modals.add-user')
    @include('components.modals.edit-user')
    @include('components.modals.delete-user')
@endsection
