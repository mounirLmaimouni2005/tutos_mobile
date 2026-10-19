<?php
require_once __DIR__ . '/User.php';

class Auteur extends User {
    private string $nom;
    private string $prenom;
    private string $biographie;

    public function getRoleName(): string {
        return "Auteur publié";
    }
}
