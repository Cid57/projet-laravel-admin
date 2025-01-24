@extends('layouts.app')

@section('content')
<!-- Hero Section avec animation et gradient moderne -->
<div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900">
    <div class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 backdrop-blur-3xl"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in tracking-tight">
                Bienvenue sur <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">AdminEasy</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed font-light">
                Votre outil ultime de gestion et d'administration
            </p>
            <div class="mt-10 flex justify-center gap-x-6">
                <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-6 py-3 bg-indigo-600 text-white font-medium hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-slate-900 transition-all duration-200 shadow-lg shadow-indigo-500/25">
                    Commencer maintenant
                </a>
                <a href="#features" class="rounded-lg px-6 py-3 text-slate-300 font-medium hover:bg-white/10 transition-all duration-200">
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 w-full h-px bg-gradient-to-r from-transparent via-slate-200/10 to-transparent"></div>
</div>

<!-- Section des Fonctionnalités -->
<div id="features" class="relative bg-slate-50 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 sm:text-4xl mb-4">
                Fonctionnalités principales
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Des outils puissants pour une gestion efficace
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Carte Gestion des Utilisateurs -->
            <div class="group relative">
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 to-slate-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative p-6">
                        <div class="aspect-w-16 aspect-h-9 mb-6 overflow-hidden rounded-xl">
                            <img src="{{ asset('images/image1.webp') }}" 
                                 class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500" 
                                 alt="Gestion des Utilisateurs">
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
                            Gestion des Utilisateurs
                        </h3>
                        <p class="text-slate-600">
                            Gérez efficacement les utilisateurs avec des options de tri, de modification et de suppression.
                        </p>
                        <div class="mt-6 flex items-center text-indigo-600">
                            <span class="text-sm font-medium">En savoir plus</span>
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte Suivi des Activités -->
            <div class="group relative">
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-50 to-slate-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative p-6">
                        <div class="aspect-w-16 aspect-h-9 mb-6 overflow-hidden rounded-xl">
                            <img src="{{ asset('images/image2.avif') }}" 
                                 class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500" 
                                 alt="Suivi des Activités">
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3 group-hover:text-cyan-600 transition-colors">
                            Suivi des Activités
                        </h3>
                        <p class="text-slate-600">
                            Gardez un œil sur les activités importantes et les mises à jour en temps réel.
                        </p>
                        <div class="mt-6 flex items-center text-cyan-600">
                            <span class="text-sm font-medium">En savoir plus</span>
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte Statistiques -->
            <div class="group relative">
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-slate-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative p-6">
                        <div class="aspect-w-16 aspect-h-9 mb-6 overflow-hidden rounded-xl">
                            <img src="{{ asset('images/image3.png') }}" 
                                 class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500" 
                                 alt="Statistiques & Rapports">
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 mb-3 group-hover:text-purple-600 transition-colors">
                            Statistiques & Rapports
                        </h3>
                        <p class="text-slate-600">
                            Accédez à des analyses détaillées et générez des rapports personnalisés.
                        </p>
                        <div class="mt-6 flex items-center text-purple-600">
                            <span class="text-sm font-medium">En savoir plus</span>
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section CTA -->
<div class="relative bg-slate-900 py-16">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Prêt à optimiser votre gestion ?</h2>
        <p class="text-lg text-slate-400 mb-8 max-w-2xl mx-auto">
            Rejoignez des milliers d'utilisateurs satisfaits et transformez votre façon de gérer.
        </p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('register') }}" 
               class="inline-flex items-center px-6 py-3 rounded-lg text-base font-medium bg-white text-slate-900 hover:bg-slate-100 transition-colors duration-200">
                Créer un compte gratuit
            </a>
            <a href="{{ route('login') }}" 
               class="inline-flex items-center px-6 py-3 rounded-lg text-base font-medium text-white border border-white/20 hover:bg-white/10 transition-colors duration-200">
                Se connecter
            </a>
        </div>
    </div>
</div>
@endsection
