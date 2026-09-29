
<?php

header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER["REQUEST_METHOD"];

$file = __DIR__ . "/categories.json";


// Lire les catégories existantes
function lireCategories($file) {
    if (!file_exists($file)) {
        return [];
    }

    $contenu = file_get_contents($file);
    $categories = json_decode($contenu, true);

    return is_array($categories) ? $categories : [];
}


// Enregistrer les catégories
function enregistrerCategories($file, $categories) {
    return file_put_contents(
        $file,
        json_encode(
            $categories,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        ),
        LOCK_EX
    );
}


// GET : récupérer toutes les catégories
if ($method === "GET") {

    $categories = lireCategories($file);

    echo json_encode($categories);

    exit;
}


// Vérifier les méthodes autorisées
if (!in_array($method, ["POST", "PUT", "DELETE"])) {

    http_response_code(405);

    echo json_encode([
        "success" => false,
        "message" => "Méthode non autorisée"
    ]);

    exit;
}


// Lire les données envoyées par JavaScript
$input = file_get_contents("php://input");
$data = json_decode($input, true);


// Vérifier les données JSON
if (!is_array($data)) {

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Données JSON invalides"
    ]);

    exit;
}


// POST : ajouter une catégorie
if ($method === "POST") {

    // Vérifier les champs obligatoires
    if (
        !isset($data["nom"], $data["couleur"], $data["icone"])
    ) {

        http_response_code(400);

        echo json_encode([
            "success" => false,
            "message" => "Champs obligatoires manquants"
        ]);

        exit;
    }

    $categories = lireCategories($file);

    // Générer un nouvel ID
    $ids = array_column($categories, "id");

    $newId = empty($ids) ? 1 : max($ids) + 1;

    // Créer la nouvelle catégorie
    $nouvelleCategorie = [
        "id" => $newId,
        "nom" => $data["nom"],
        "couleur" => $data["couleur"],
        "icone" => $data["icone"]
    ];

    // Ajouter la catégorie
    $categories[] = $nouvelleCategorie;

    // Enregistrer dans le fichier JSON
    $resultat = enregistrerCategories($file, $categories);

    if ($resultat !== false) {

        http_response_code(201);

        echo json_encode([
            "success" => true,
            "message" => "Catégorie ajoutée avec succès",
            "data" => $nouvelleCategorie
        ]);

    } else {

        http_response_code(500);

        echo json_encode([
            "success" => false,
            "message" => "Erreur lors de l'enregistrement"
        ]);
    }

    exit;
}


// PUT : modifier une catégorie
if ($method === "PUT") {

    // Vérifier les champs obligatoires
    if (
        !isset($data["id"], $data["nom"], $data["couleur"], $data["icone"])
    ) {

        http_response_code(400);

        echo json_encode([
            "success" => false,
            "message" => "ID ou champs obligatoires manquants"
        ]);

        exit;
    }

    $categories = lireCategories($file);

    $categorieTrouvee = false;

    foreach ($categories as &$category) {

        if ((int) $category["id"] === (int) $data["id"]) {

            $category["nom"] = $data["nom"];
            $category["couleur"] = $data["couleur"];
            $category["icone"] = $data["icone"];

            $categorieTrouvee = true;

            break;
        }
    }

    unset($category);

    // Vérifier si la catégorie existe
    if (!$categorieTrouvee) {

        http_response_code(404);

        echo json_encode([
            "success" => false,
            "message" => "Catégorie introuvable"
        ]);

        exit;
    }

    // Enregistrer les modifications
    $resultat = enregistrerCategories($file, $categories);

    if ($resultat !== false) {

        echo json_encode([
            "success" => true,
            "message" => "Catégorie modifiée avec succès"
        ]);

    } else {

        http_response_code(500);

        echo json_encode([
            "success" => false,
            "message" => "Erreur lors de la modification"
        ]);
    }

    exit;
}


// DELETE : supprimer une catégorie
if ($method === "DELETE") {

    // Vérifier que l'ID est envoyé
    if (!isset($data["id"])) {

        http_response_code(400);

        echo json_encode([
            "success" => false,
            "message" => "ID obligatoire pour supprimer une catégorie"
        ]);

        exit;
    }

    $categories = lireCategories($file);

    $id = (int) $data["id"];

    // Filtrer les catégories pour retirer celle qui correspond à l'ID
    $categoriesFiltrees = array_values(
        array_filter($categories, function ($category) use ($id) {
            return (int) $category["id"] !== $id;
        })
    );

    // Vérifier si une catégorie a été supprimée
    if (count($categoriesFiltrees) === count($categories)) {

        http_response_code(404);

        echo json_encode([
            "success" => false,
            "message" => "Catégorie introuvable"
        ]);

        exit;
    }

    // Enregistrer le nouveau tableau sans la catégorie supprimée
    $resultat = enregistrerCategories($file, $categoriesFiltrees);

    if ($resultat !== false) {

        echo json_encode([
            "success" => true,
            "message" => "Catégorie supprimée avec succès"
        ]);

    } else {

        http_response_code(500);

        echo json_encode([
            "success" => false,
            "message" => "Erreur lors de la suppression"
        ]);
    }

    exit;
}

?>