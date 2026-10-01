# Partie 2 — Pratique

## 2.1. Décomposer la fonctionnalité « Gérer les catégories »

### Fonctionnalité

**Gérer les catégories**

### Décomposition en tâches

| N° | Tâche | Dépendance |
|---|---|---|
| 1 | Définir le modèle de données des catégories | Aucune |
| 2 | Créer l'API CRUD pour les catégories | Tâche 1 |
| 3 | Créer l'interface HTML de gestion des catégories | Aucune |
| 4 | Connecter l'interface à l'API avec `fetch()` | Tâches 2 et 3 |
| 5 | Tester les opérations CRUD | Tâche 4 |
| 6 | Corriger les anomalies détectées | Tâche 5 |

### Dépendances

```text
Tâche 1
   ↓
Tâche 2
   ↓
   └────────┐
            ↓
Tâche 3 → Tâche 4
               ↓
            Tâche 5
               ↓
            Tâche 6
```

### Explication

- **Tâche 1** : définir les informations nécessaires pour une catégorie.
- **Tâche 2** : créer l'API permettant d'ajouter, afficher, modifier et supprimer les catégories.
- **Tâche 3** : créer le formulaire et le tableau HTML.
- **Tâche 4** : connecter l'interface avec l'API grâce à `fetch()`.
- **Tâche 5** : vérifier que les opérations fonctionnent correctement.
- **Tâche 6** : corriger les erreurs trouvées pendant les tests.
