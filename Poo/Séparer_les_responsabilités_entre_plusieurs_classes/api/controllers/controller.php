
<?php

require_once __DIR__ . '/../../backend/classes/gestionCategorie.php';

class CategorieController
{
    public function listerCategories(): void
    {
        $gestion = new GestionCategorie();
        $categories = $gestion->getAll();

        foreach ($categories as $cat) {
            echo htmlspecialchars($cat->getNom()) . "<br>";
        }
    }
}

// Test d'exécution
$controller = new CategorieController();
$controller->listerCategories();
