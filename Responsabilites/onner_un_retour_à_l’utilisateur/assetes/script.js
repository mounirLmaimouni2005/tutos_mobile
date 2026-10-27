
const formCategorie = document.getElementById('form-categorie');
const btnSubmitForm = document.getElementById('btn-submit-form');
const spinner = document.getElementById('spinner');
const btnText = document.getElementById('btn-text');

function setLoadingState(isLoading) {
    btnSubmitForm.disabled = isLoading;
    spinner.classList.toggle('hidden', !isLoading);
    btnText.textContent = isLoading ? 'Enregistrement...' : 'Enregistrer';
}

function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    toast.className = `toast toast-${type}`;
    toast.textContent = message;

    container.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

formCategorie.addEventListener('submit', (event) => {
    event.preventDefault();

    setLoadingState(true);

    const nom = document.getElementById('nom').value.trim();

    // Simulation d'une opération asynchrone
    setTimeout(() => {
        if (nom.toLowerCase() === 'error') {
            showToast('Erreur : impossible d’enregistrer la catégorie.', 'error');
            return;
        }

        showToast('Catégorie enregistrée avec succès !', 'success');
        formCategorie.reset();

    }, 2000);

    setTimeout(() => {
        setLoadingState(false);
    }, 2000);
});
