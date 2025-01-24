@extends('layouts.admin')

@section('title', 'Paramètres')
@section('header_title', 'Paramètres')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Navigation des paramètres -->
        <div class="mb-6 border-b border-slate-200">
            <nav class="flex space-x-8" aria-label="Tabs">
                <button onclick="showTab('general')" 
                        class="tab-button border-b-2 border-indigo-500 py-4 px-1 text-sm font-medium text-indigo-600 whitespace-nowrap">
                    Général
                </button>
                <button onclick="showTab('security')"
                        class="tab-button border-b-2 border-transparent py-4 px-1 text-sm font-medium text-slate-500 hover:text-slate-700 hover:border-slate-300 whitespace-nowrap">
                    Sécurité
                </button>
                <button onclick="showTab('notifications')"
                        class="tab-button border-b-2 border-transparent py-4 px-1 text-sm font-medium text-slate-500 hover:text-slate-700 hover:border-slate-300 whitespace-nowrap">
                    Notifications
                </button>
                <button onclick="showTab('appearance')"
                        class="tab-button border-b-2 border-transparent py-4 px-1 text-sm font-medium text-slate-500 hover:text-slate-700 hover:border-slate-300 whitespace-nowrap">
                    Apparence
                </button>
            </nav>
        </div>

        <!-- Contenu des paramètres -->
        <div class="space-y-6">
            <!-- Paramètres généraux -->
            <div id="general" class="tab-content">
                <div class="bg-white rounded-xl shadow-sm divide-y divide-slate-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-slate-900">Informations de l'application</h3>
                                <p class="mt-1 text-sm text-slate-500">Configurez les informations de base de votre application.</p>
                            </div>
                            <button type="button" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                Modifier
                            </button>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6">
                            <div>
                                <dt class="text-sm font-medium text-slate-500">Nom de l'application</dt>
                                <dd class="mt-1 text-sm text-slate-900">AdminEasy</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500">Version</dt>
                                <dd class="mt-1 text-sm text-slate-900">1.0.0</dd>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-slate-900">Localisation</h3>
                                <p class="mt-1 text-sm text-slate-500">Définissez la langue et le fuseau horaire.</p>
                            </div>
                            <button type="button" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                Modifier
                            </button>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6">
                            <div>
                                <dt class="text-sm font-medium text-slate-500">Langue</dt>
                                <dd class="mt-1 text-sm text-slate-900">Français</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500">Fuseau horaire</dt>
                                <dd class="mt-1 text-sm text-slate-900">Europe/Paris</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paramètres de sécurité -->
            <div id="security" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-sm divide-y divide-slate-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-slate-900">Authentification à deux facteurs</h3>
                                <p class="mt-1 text-sm text-slate-500">Renforcez la sécurité de votre compte.</p>
                            </div>
                            <div class="flex items-center">
                                <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-slate-200">
                                    <span class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-slate-900">Sessions actives</h3>
                                <p class="mt-1 text-sm text-slate-500">Gérez vos sessions de connexion actives.</p>
                            </div>
                            <button type="button" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                Voir tout
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paramètres des notifications -->
            <div id="notifications" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-sm divide-y divide-slate-200">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-slate-900 mb-4">Préférences de notification</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-slate-900">Notifications par email</p>
                                    <p class="text-sm text-slate-500">Recevez des mises à jour par email</p>
                                </div>
                                <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-indigo-600">
                                    <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-slate-900">Notifications push</p>
                                    <p class="text-sm text-slate-500">Recevez des notifications push</p>
                                </div>
                                <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-slate-200">
                                    <span class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paramètres d'apparence -->
            <div id="appearance" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-sm divide-y divide-slate-200">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-slate-900 mb-4">Thème</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <button class="aspect-w-16 aspect-h-9 rounded-lg bg-white border-2 border-indigo-500 p-2 focus:outline-none">
                                <span class="text-sm font-medium text-slate-900">Clair</span>
                            </button>
                            <button class="aspect-w-16 aspect-h-9 rounded-lg bg-slate-900 border-2 border-transparent p-2 focus:outline-none">
                                <span class="text-sm font-medium text-white">Sombre</span>
                            </button>
                            <button class="aspect-w-16 aspect-h-9 rounded-lg bg-gradient-to-r from-slate-900 to-white border-2 border-transparent p-2 focus:outline-none">
                                <span class="text-sm font-medium text-slate-900">Auto</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Cacher tous les contenus
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Afficher le contenu sélectionné
            document.getElementById(tabName).classList.remove('hidden');
            
            // Mettre à jour les styles des boutons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('border-indigo-500', 'text-indigo-600');
                button.classList.add('border-transparent', 'text-slate-500');
            });
            
            // Mettre en évidence le bouton actif
            const activeButton = document.querySelector(`[onclick="showTab('${tabName}')"]`);
            activeButton.classList.remove('border-transparent', 'text-slate-500');
            activeButton.classList.add('border-indigo-500', 'text-indigo-600');
        }
    </script>
@endsection
