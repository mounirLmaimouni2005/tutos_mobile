<?php

class Categorie
{
    private int $id;
    private string $nom;
    private string $couleur;
    private string $icone;

    public function __construct(
        int $id,
        string $nom,
        string $couleur,
        string $icone
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->icone = $icone;
    }

    // Getter id
    public function getId(): int
    {
        return $this->id;
    }

    // Setter id
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter nom
    public function getNom(): string
    {
        return $this->nom;
    }

    // Setter nom
    public function setNom(string $nom): void
    {
        if (strlen($nom) > 2) {
            $this->nom = $nom;
        } else {
            echo "Erreur : Nom trop court !<br>";
        }
    }

    // Getter couleur
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    // Setter couleur
    public function setCouleur(string $couleur): void
    {
        $this->couleur = $couleur;
    }

    // Getter icone
    public function getIcone(): string
    {
        return $this->icone;
    }

    // Setter icone
    public function setIcone(string $icone): void
    {
        $this->icone = $icone;
    }

    public function afficher(): void
    {
        echo $this->nom . " - " . $this->couleur . " - " . $this->icone;
    }
}