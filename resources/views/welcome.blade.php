<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
  
    
   
    </style>
</head>
<body>

    <!-- Section Héroïque -->
    <div class="hero-section">
        <h1>Bienvenue sur AdminEasy</h1>
        <p class="lead">Votre outil ultime de gestion et d'administration.</p>
    <!--    <a href="{{ route('admin.page') }}" class="btn btn-light btn-lg mt-4">Accéder au Tableau de Bord</a> -->
    </div>

    <!-- Section des Fonctionnalités -->
    <div class="container features">
        <div class="row text-center my-5">
            <div class="col-md-4">
                <a href="{{ route('admin.page') }}" class="text-decoration-none text-dark">
                    <div class="card feature-card shadow-sm p-4">
                        <img src="{{ asset('images/image1.webp') }}" class="card-img-top mx-auto" alt="Gestion des Utilisateurs">
                        <div class="card-body">
                            <h5 class="card-title">Gestion des Utilisateurs</h5>
                            <p class="card-text">Gérez efficacement les utilisateurs avec des options de tri, de modification et de suppression.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4">
                    <img src="{{ asset('images/image2.avif') }}" class="card-img-top mx-auto" alt="Suivi des Activités">
                    <div class="card-body">
                        <h5 class="card-title">Suivi des Activités</h5>
                        <p class="card-text">Gardez un œil sur les activités importantes et les mises à jour en temps réel.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card shadow-sm p-4">
                    <img src="{{ asset('images/image3.png') }}" class="card-img-top mx-auto" alt="Statistiques & Rapports">
                    <div class="card-body">
                        <h5 class="card-title">Statistiques & Rapports</h5>
                        <p class="card-text">Accédez à des rapports détaillés et des statistiques pour une meilleure prise de décision.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="footer mt-auto">
        <div>
            <h5>Contactez-Nous</h5>
            <p>Email: contact@cindysinger.com</p>
            <p>Téléphone: +33 1 23 45 67 89</p>
        </div>
        <div>
            <h5>Suivez-Nous</h5>
            <p>Facebook | Twitter | LinkedIn</p>
        </div>
        <div>
            <h5>Adresse</h5>
            <p>123 Rue Exemple, 57000 Metz, France</p>
        </div>
    </div>
