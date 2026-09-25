<?php

require_once 'Categorie.php';

$cat = new Categorie(
    1,
    "PHP",
    "Bleu",
    "cs_tt"
);

$cat->setId(2);
$cat->setNom("Développement Web");
$cat->setCouleur("Rouge");
$cat->setIcone("cs_tt");

echo "ID : " . $cat->getId() . "<br>";
echo "Nom : " . $cat->getNom() . "<br>";
echo "Couleur : " . $cat->getCouleur() . "<br>";
echo "Icone : " . $cat->getIcone() . "<br>";

echo "<br>";

$cat->afficher();