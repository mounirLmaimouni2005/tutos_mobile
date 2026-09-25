<?php

header("Content-Type: application/json");

$categories = [
    [
        "id" => 1,
        "nom" => "Développement"
    ],
    [
        "id" => 2,
        "nom" => "Design"
    ],
    [
        "id" => 3,
        "nom" => "Technologie"
    ]
];

echo json_encode($categories);