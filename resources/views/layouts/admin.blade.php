<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        .sidebar-expanded { width: 16rem; }
        .sidebar-collapsed { width: 5rem; }
    </style>
</head>

<body class="bg-slate-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside id="sidebar" 
               x-data="{ expanded: true }" 
               :class="expanded ? 'sidebar-expanded' : 'sidebar-collapsed'"
               class="bg-slate-900 text-white transition-all duration-300">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold" x-show="expanded">AdminEasy</h2>
                    <button @click="expanded = !expanded" class="text-white hover:text-slate-300 transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
                
                <!-- Navigation -->
                <nav class="mt-8 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition-colors {{ Request::routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : '' }}">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span class="ml-3" x-show="expanded" x-transition>Tableau de bord</span>
                    </a>
                    <a href="{{ route('admin.users') }}" 
                       class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition-colors {{ Request::routeIs('admin.users') ? 'bg-indigo-600 text-white' : '' }}">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-3" x-show="expanded" x-transition>Utilisateurs</span>
                    </a>
                    <a href="{{ route('activities.index') }}" 
                       class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition-colors {{ Request::routeIs('activities.*') ? 'bg-indigo-600 text-white' : '' }}">
                        <i class="fas fa-calendar-alt w-5"></i>
                        <span class="ml-3" x-show="expanded" x-transition>Activités</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" 
                       class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition-colors {{ Request::routeIs('admin.settings') ? 'bg-indigo-600 text-white' : '' }}">
                        <i class="fas fa-cog w-5"></i>
                        <span class="ml-3" x-show="expanded" x-transition>Paramètres</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-8 py-4">
                    <h1 class="text-2xl font-bold text-slate-900">@yield('header_title')</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="flex items-center text-slate-700 hover:text-slate-900">
                                <span class="mr-2">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>
                            <ul x-show="open" 
                                x-cloak
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                        Profile
                                    </a>
                                </li>
                                <li><hr class="my-2 border-slate-200"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="block w-full">
                                        @csrf
                                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-100">
                                            Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
