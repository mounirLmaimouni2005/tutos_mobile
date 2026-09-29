
const API_URL = "../backend/api.php";

let categorieEnEdition = null;

const form = document.querySelector("#categoryForm");
const nomInput = document.querySelector("#nom");
const couleurInput = document.querySelector("#couleur");
const iconeInput = document.querySelector("#icone");
const tableBody = document.querySelector("#tableBody");
const btnSubmit = document.querySelector("#btn-submit");


// GET : récupérer toutes les catégories
function chargerCategories() {

    fetch(API_URL, {
        method: "GET"
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erreur lors du chargement des catégories");
        }

        return response.json();
    })
    .then(categories => {

        tableBody.innerHTML = "";

        categories.forEach(category => {

            const tr = document.createElement("tr");

            tr.innerHTML = `
                <td>${category.id}</td>
                <td>${category.nom}</td>
                <td>${category.couleur}</td>
                <td>${category.icone}</td>
                <td>
                    <button type="button" class="btn-modifier">
                        Modifier
                    </button>

                    <button type="button" class="btn-supprimer">
                        Supprimer
                    </button>
                </td>
            `;


            // Bouton Modifier
            const btnModifier = tr.querySelector(".btn-modifier");

            btnModifier.addEventListener("click", function () {

                categorieEnEdition = category.id;

                nomInput.value = category.nom;
                couleurInput.value = category.couleur;
                iconeInput.value = category.icone;

                btnSubmit.textContent = "Modifier";

            });


            // Bouton Supprimer
            const btnSupprimer = tr.querySelector(".btn-supprimer");

            btnSupprimer.addEventListener("click", function () {

                supprimerCategorie(category.id);

            });


            tableBody.appendChild(tr);

        });

    })
    .catch(error => {
        console.error("Erreur :", error);
    });

}



// POST : ajouter une catégorie
// PUT : modifier une catégorie
function ajouterCategorie(e) {

    e.preventDefault();

    const nouvelleCategorie = {
        nom: nomInput.value.trim(),
        couleur: couleurInput.value.trim(),
        icone: iconeInput.value.trim()
    };


    // Déterminer la méthode HTTP
    const method = categorieEnEdition === null ? "POST" : "PUT";


    // Ajouter l'ID uniquement en mode modification
    if (categorieEnEdition !== null) {
        nouvelleCategorie.id = categorieEnEdition;
    }


    fetch(API_URL, {
        method: method,

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify(nouvelleCategorie)
    })
    .then(response => {
        return response.json().then(data => {

            if (!response.ok) {
                throw new Error(data.message || "Une erreur est survenue");
            }

            return data;
        });
    })
    .then(data => {

        console.log(data.message);

        if (data.success) {

            form.reset();

            categorieEnEdition = null;

            btnSubmit.textContent = "Ajouter";

            chargerCategories();

        }

    })
    .catch(error => {
        console.error("Erreur :", error);
        alert(error.message);
    });

}



// DELETE : supprimer une catégorie
function supprimerCategorie(id) {

    const confirmation = confirm(
        "Voulez-vous vraiment supprimer cette catégorie ?"
    );

    if (!confirmation) {
        return;
    }


    fetch(API_URL, {
        method: "DELETE",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify({
            id: id
        })
    })
    .then(response => {
        return response.json().then(data => {

            if (!response.ok) {
                throw new Error(data.message || "Erreur lors de la suppression");
            }

            return data;
        });
    })
    .then(data => {

        console.log(data.message);

        if (data.success) {

            // Si la catégorie supprimée était en cours de modification
            if (categorieEnEdition === id) {

                categorieEnEdition = null;

                form.reset();

                btnSubmit.textContent = "Ajouter";

            }

            chargerCategories();

        }

    })
    .catch(error => {
        console.error("Erreur :", error);
        alert(error.message);
    });

}



// Réinitialiser le formulaire
form.addEventListener("reset", function () {

    categorieEnEdition = null;

    btnSubmit.textContent = "Ajouter";

});



// Écouter la soumission du formulaire
form.addEventListener("submit", ajouterCategorie);


// Charger les catégories au démarrage
chargerCategories();