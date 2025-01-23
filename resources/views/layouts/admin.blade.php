<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-dark text-white">
        <div class="p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">Admin Panel</h2>
                <button id="sidebarToggle" class="btn btn-link text-white p-0">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="nav-link text-white {{ Request::routeIs('admin.users') ? 'active' : '' }}">
                            <i class="fas fa-users me-2"></i> Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('activities.index') }}" class="nav-link text-white {{ Request::routeIs('activities.*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-alt me-2"></i> Activités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings') }}" class="nav-link text-white {{ Request::routeIs('admin.settings') ? 'active' : '' }}">
                            <i class="fas fa-cog me-2"></i> Paramètres
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main id="content" class="p-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded">
            <div class="container-fluid">
                <button id="mobileSidebarToggle" class="btn btn-link d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>
                
                <h1 class="h4 mb-0">@yield('header_title', 'Dashboard')</h1>

                <div class="ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle text-dark" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');

            function toggleSidebar() {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('expanded');
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }

            if (mobileSidebarToggle) {
                mobileSidebarToggle.addEventListener('click', toggleSidebar);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
