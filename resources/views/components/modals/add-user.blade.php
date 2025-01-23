<!-- Modal Ajout Utilisateur -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white rounded-lg shadow-xl">
            <div class="modal-header bg-blue-500 text-white p-4">
                <h5 class="modal-title text-lg font-bold">Ajouter un Utilisateur</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-6">
                <form id="addUserForm" action="{{ route('admin.addUser') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="name" name="name" required>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="email" name="email" required>
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="password" name="password" required>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="phone" name="phone">
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="address" name="address">
                        </div>
                        
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Code Postal</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="postal_code" name="postal_code">
                        </div>
                        
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                   id="city" name="city">
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" class="btn-custom bg-gray-500 text-white hover:bg-gray-600" data-dismiss="modal">
                            Annuler
                        </button>
                        <button type="submit" class="btn-custom bg-blue-500 text-white hover:bg-blue-600">
                            <i class="fas fa-plus mr-2"></i> Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openAddUserModal() {
    const modal = document.getElementById('addUserModal');
    modal.classList.add('show');
    modal.style.display = 'block';
}

// Fermeture du modal
document.querySelectorAll('[data-dismiss="modal"]').forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal');
        modal.classList.remove('show');
        modal.style.display = 'none';
    });
});
</script>

<style>
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1050;
}

.modal.show {
    display: block;
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: 1.75rem auto;
    max-width: 800px;
}

.close {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.5rem;
}

.close:hover {
    opacity: 0.75;
}
</style>
