```markdown
---
marp: true
---

# Suite de cas de blog

## Scénario d’erreur

**Condition :**  
dans l etape de (saisir les information d article ) l auteur oublier de saisir le contenu d article avant d enregistrer

**Scénario d’erreur :**  
le system blog l enregistrement d article avec message d err ( le contenu est obligatoire)

**Reprise :**  
auteur est remplire le contenu et repeter la meme etape

---

## Scénario alternatif

**Condition alternatif :**  
L’auteur selectioner la status d article brouent a l etape de saisir.

**Scénario alternatif :**

1. auteur a clicker sur le button enregistrer
2. le system est enregistre l'article dans la base de donner sous le status brouient
3. le system redirect l auteur vers la list des articles

**Fin sinario :**  
l article a ete enregistrer mais il est non visible dans list articles de visiteur
```
