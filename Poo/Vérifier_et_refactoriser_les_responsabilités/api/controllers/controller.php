
<?php

require_once __DIR__ . '/../../backend/classes/gestionCategorie.php';


class CategorieController
{
    public function listerCategories(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        $gestion = new GestionCategorie();
        $categories = $gestion->getAll();

        $data = [];

        foreach ($categories as $cat) {
            $data[] = [
                'id' => $cat->getId(),
                'nom' => $cat->getNom(),
                'couleur' => $cat->getCouleur(),
                'icone' => $cat->getIcone()
            ];
        }

        echo json_encode(
            $data,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );
    }
}

// Test d'exécution
$controller = new CategorieController();
$controller->listerCategories();
