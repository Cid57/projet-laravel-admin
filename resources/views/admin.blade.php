@extends('layouts.admin')

@section('title', 'Tableau de Bord Admin')
@section('header_title', 'Tableau de Bord')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Utilisateurs -->
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 bg-indigo-500 rounded-full">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <h3 class="text-sm font-medium text-slate-600">Total Utilisateurs</h3>
                    <p class="text-2xl font-bold text-slate-900">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        
        <!-- Activités Actives -->
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 bg-emerald-500 rounded-full">
                        <i class="fas fa-calendar-check text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <h3 class="text-sm font-medium text-slate-600">Activités Actives</h3>
                    <p class="text-2xl font-bold text-slate-900">0</p>
                </div>
            </div>
        </div>
        
        <!-- En attente -->
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 bg-amber-500 rounded-full">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <h3 class="text-sm font-medium text-slate-600">En attente</h3>
                    <p class="text-2xl font-bold text-slate-900">0</p>
                </div>
            </div>
        </div>
        
        <!-- Alertes -->
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 bg-rose-500 rounded-full">
                        <i class="fas fa-exclamation-circle text-white text-xl"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <h3 class="text-sm font-medium text-slate-600">Alertes</h3>
                    <p class="text-2xl font-bold text-slate-900">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Activité Récente</h3>
            <div class="space-y-4">
                <div class="flex items-center p-4 bg-slate-50 rounded-lg">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                            <i class="fas fa-user-plus text-indigo-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-slate-900">Nouvel utilisateur inscrit</p>
                        <p class="text-sm text-slate-500">Il y a 2 heures</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Actions Rapides</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.users') }}" class="flex items-center p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors">
                    <i class="fas fa-user-plus text-indigo-600 mr-3"></i>
                    <span class="text-sm font-medium text-slate-900">Ajouter un utilisateur</span>
                </a>
                <a href="{{ route('activities.index') }}" class="flex items-center p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors">
                    <i class="fas fa-calendar-plus text-emerald-600 mr-3"></i>
                    <span class="text-sm font-medium text-slate-900">Créer une activité</span>
                </a>
            </div>
        </div>
    </div>
@endsection
