<!-- Modal Édition Utilisateur -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white rounded-lg shadow-xl">
            <div class="modal-header bg-yellow-500 text-white p-4">
                <h5 class="modal-title text-lg font-bold">Éditer l'Utilisateur</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-6">
                <form id="editUserForm" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="editName" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                   id="editName" name="name" required>
                        </div>
                        
                        <div>
                            <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                   id="editEmail" name="email" required>
                        </div>
                        
                        <div>
                            <label for="editPhone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                   id="editPhone" name="phone">
                        </div>
                        
                        <div>
                            <label for="editAddress" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                   id="editAddress" name="address">
                        </div>
                        
                        <div>
                            <label for="editPostalCode" class="block text-sm font-medium text-gray-700">Code Postal</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                   id="editPostalCode" name="postal_code">
                        </div>
                        
                        <div>
                            <label for="editCity" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                   id="editCity" name="city">
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" class="btn-custom bg-gray-500 text-white hover:bg-gray-600" data-dismiss="modal">
                            Annuler
                        </button>
                        <button type="submit" class="btn-custom bg-yellow-500 text-white hover:bg-yellow-600">
                            <i class="fas fa-save mr-2"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openEditUserModal(userId) {
    const modal = document.getElementById('editUserModal');
    const form = document.getElementById('editUserForm');
    
    // Mettre à jour l'action du formulaire
    form.action = `/admin/edit-user/${userId}`;
    
    // Récupérer les données de l'utilisateur via AJAX
    fetch(`/admin/get-user/${userId}`)
        .then(response => response.json())
        .then(user => {
            document.getElementById('editName').value = user.name || '';
            document.getElementById('editEmail').value = user.email || '';
            document.getElementById('editPhone').value = user.phone || '';
            document.getElementById('editAddress').value = user.address || '';
            document.getElementById('editPostalCode').value = user.postal_code || '';
            document.getElementById('editCity').value = user.city || '';
            
            modal.classList.add('show');
            modal.style.display = 'block';
        });
}
</script>
