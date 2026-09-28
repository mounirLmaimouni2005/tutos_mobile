---
marp: true
theme: default
paginate: true
---

# Décomposition des données

## Gestion des commandes

---

# 1. Dictionnaire de données

| Nom | Signification | Format | Obligatoire | Calculée |
| :--- | :--- | :--- | :---: | :---: |
| numero_commande | Numéro de la commande | Texte | Oui | Non |
| date_commande | Date de la commande | Date | Oui | Non |
| nom_client | Nom du client | Texte | Oui | Non |
| email_client | Email du client | Email | Oui | Non |
| nom_produit | Nom du produit | Texte | Oui | Non |
| prix_produit | Prix du produit | Décimal | Oui | Non |
| quantite_commandee | Quantité commandée | Entier | Oui | Non |

---

# 2. Dépendances fonctionnelles

* **numero_commande** → date_commande  
* **numero_commande** → nom_client  
* **numero_commande** → email_client  

* **nom_produit** → prix_produit  

* **(numero_commande, nom_produit)** → quantite_commandee  

---

# 3. Groupes

**Client**  
* nom_client  
* email_client  

**Commande**  
* numero_commande  
* date_commande  

**Produit**  
* nom_produit  
* prix_produit  

---

# Ligne de commande  

* numero_commande  
* nom_produit  
* quantite_commandee  

---

# 1. Entités  

* **CLIENT**  
* **COMMANDE**  
* **PRODUIT**  
* **LIGNE_COMMANDE**  

# 1. Tables finales  

### CLIENT

CLIENT (
id_client,
nom_client,
email_client
)

---

### COMMANDE

COMMANDE (
numero_commande,
date_commande,
id_client
)

### PRODUIT
PRODUIT (
id_produit,
nom_produit,
prix_produit
)

---

### LIGNE_COMMANDE
LIGNE_COMMANDE (
numero_commande,
id_produit,
quantite_commandee
)