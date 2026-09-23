---
marp: true
theme: default
paginate: false
---

# Suite de cas de blog

## Scénario d’erreur

**Condition :**  
Dans l’étape de saisir les informations d’article, l’auteur oublie de saisir le contenu de l’article avant d’enregistrer.

**Scénario d’erreur :**  
Le système bloque l’enregistrement de l’article et affiche un message d’erreur :  
**« Le contenu est obligatoire »**

**Reprise :**  
L’auteur remplit le contenu et répète la même étape.

---

## Scénario alternatif

**Condition alternatif :**  
L’auteur sélectionne le statut **Brouillon** à l’étape de saisie.

**Scénario alternatif :**

1. L’auteur clique sur le bouton **Enregistrer**.
2. Le système enregistre l’article dans la base de données sous le statut **Brouillon**.
3. Le système redirige l’auteur vers la liste des articles.

**Fin scénario :**  
L’article a été enregistré mais il est **non visible dans la liste des articles du visiteur**.