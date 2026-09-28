<?php


require_once 'Categories.php';

$cat1 = new Categories(1, "Développement Web", "Bleu", "fa-code");

$cat2 = new Categories(2, "Design UI/UX", "Rouge", "fa-paint-brush");

$cat1->afficher();
$cat2->afficher();











?>