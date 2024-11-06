<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])  
</head>

<body>
    <div class="container mt-5">
        <!-- En-tête avec boutons alignés à droite -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Bienvenue sur le Tableau de Bord Admin</h1>
            <div class="d-flex gap-2">
                <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-user-plus me-2"></i> Ajouter un Utilisateur
                </button>
                <button class="btn btn-secondary d-flex align-items-center" onclick="window.location.href='{{ route('home') }}'">
                    <i class="fas fa-home me-2"></i> Retour à l'accueil
                </button>
            </div>
        </div>
    
        <!-- Informations Générales améliorées -->
        <div class="info-box">
            <h5 class="mb-0">Informations Générales</h5>
            <p>Vous avez actuellement {{ $totalUsers }} utilisateurs enregistrés.</p>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Liste des Utilisateurs</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date de Création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr class="user-row">
                            <td>{{ $index + 1 }}</td>
                            <td class="user-name">{{ $user->name }}</td>
                            <td class="user-email">{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.userProfile', $user->id) }}" class="btn btn-sm btn-info">Voir</a>

                                <button type="button" class="btn btn-sm btn-warning edit-user-btn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editUserModal" 
                                data-id="{{ $user->id }}" 
                                data-name="{{ $user->name }}" 
                                data-email="{{ $user->email }}" 
                                data-address="{{ $user->address }}" 
                                data-postal_code="{{ $user->postal_code }}" 
                                data-city="{{ $user->city }}" 
                                data-phone="{{ $user->phone }}">
                                Éditer
                                </button>

                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger delete-user-btn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteUserModal" 
                                    data-id="{{ $user->id }}">
                                    Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <div class="d-flex justify-content-center mt-4">
      <nav aria-label="Page navigation example">
        {{ $users->links() }}
      </nav>
    </div>

    <!-- Modal pour le formulaire d'ajout d'utilisateur -->
    <div class="modal fade " id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Ajouter un Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="{{ route('admin.addUser') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</button> <!-- Ajout d'une icône -->
                    </form>
                    @if($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Modal pour l'édition de l'utilisateur -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Éditer l'Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="editName" name="name" >
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" >
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="editAddress" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="editPostalCode" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="editPostalCode" name="postal_code">
                        </div>
                        <div class="mb-3">
                            <label for="editCity" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="editCity" name="city">
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="editPhone" name="phone">
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmation de Suppression -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Confirmer la Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
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

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('.user-row');
            
            rows.forEach(row => {
                let name = row.querySelector('.user-name').textContent.toLowerCase();
                let email = row.querySelector('.user-email').textContent.toLowerCase();
                if (name.includes(filter) || email.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.querySelectorAll('.delete-user-btn').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.getAttribute('data-id');
        const deleteForm = document.getElementById('deleteUserForm');
        
        // Met à jour l'action du formulaire de suppression avec l'ID de l'utilisateur
        deleteForm.action = `/admin/delete-user/${userId}`;
    });
});


        document.querySelectorAll('.edit-user-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const userName = this.getAttribute('data-name');
                const userEmail = this.getAttribute('data-email');
                const userAddress = this.getAttribute('data-address');
                const userPostalCode = this.getAttribute('data-postal_code');
                const userCity = this.getAttribute('data-city');
                const userPhone = this.getAttribute('data-phone');

                document.getElementById('editName').value = userName;
                document.getElementById('editEmail').value = userEmail;
                document.getElementById('editAddress').value = userAddress;
                document.getElementById('editPostalCode').value = userPostalCode;
                document.getElementById('editCity').value = userCity;
                document.getElementById('editPhone').value = userPhone;

                document.getElementById('editUserForm').action = `/admin/edit-user/${userId}`;
            });
        });

       
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
