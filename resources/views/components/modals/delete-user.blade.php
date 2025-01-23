<!-- Modal Suppression Utilisateur -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-white rounded-lg shadow-xl">
            <div class="modal-header bg-red-500 text-white p-4">
                <h5 class="modal-title text-lg font-bold">Confirmer la Suppression</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-6">
                <div class="flex items-center mb-4">
                    <div class="rounded-full bg-red-100 p-3 mr-4">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                    </div>
                    <p class="text-gray-700">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
                </div>
                
                <form id="deleteUserForm" method="POST" class="mt-6">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-3">
                        <button type="button" class="btn-custom bg-gray-500 text-white hover:bg-gray-600" data-dismiss="modal">
                            Annuler
                        </button>
                        <button type="submit" class="btn-custom bg-red-500 text-white hover:bg-red-600">
                            <i class="fas fa-trash mr-2"></i> Supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openDeleteUserModal(userId) {
    const modal = document.getElementById('deleteUserModal');
    const form = document.getElementById('deleteUserForm');
    
    // Mettre à jour l'action du formulaire
    form.action = `/admin/delete-user/${userId}`;
    
    modal.classList.add('show');
    modal.style.display = 'block';
}
</script>
