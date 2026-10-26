<?php

require __DIR__ . '/categorie.php';

class GestionCategorie
{
    private static string $dataFile =
        __DIR__ . '/../data/categories.json';

    public function getAll(): array
    {
        if (!file_exists(self::$dataFile)) {
            return [];
        }

        $json = file_get_contents(self::$dataFile);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            return [];
        }

        $categories = [];

        foreach ($data as $row) {
            $categories[] = new Categorie(
                (int) $row['id'],
                $row['nom'],
                $row['couleur'],
                $row['icone']
            );
        }

        return $categories;
    }

    public function create(
        string $nom,
        string $couleur,
        string $icone
    ): ?Categorie {
        $categories = $this->getAll();
        $maxId = 0;

        foreach ($categories as $categorie) {
            if ($categorie->getId() > $maxId) {
                $maxId = $categorie->getId();
            }
        }

        $categorie = new Categorie(
            $maxId + 1,
            $nom,
            $couleur,
            $icone
        );

        $categories[] = $categorie;

        if (!$this->saveAll($categories)) {
            return null;
        }

        return $categorie;
    }

    public function update(
        int $id,
        string $nom,
        string $couleur,
        string $icone
    ): bool {
        $categories = $this->getAll();
        $found = false;

        foreach ($categories as $categorie) {
            if ($categorie->getId() === $id) {
                $categorie->setNom($nom);
                $categorie->setCouleur($couleur);
                $categorie->setIcone($icone);
                $found = true;
                break;
            }
        }

        if (!$found) {
            return false;
        }

        return $this->saveAll($categories);
    }

    public function delete(int $id): bool
    {
        $categories = $this->getAll();
        $found = false;

        foreach ($categories as $categorie) {
            if ($categorie->getId() === $id) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            return false;
        }

        $categories = array_values(
            array_filter(
                $categories,
                fn($categorie) => $categorie->getId() !== $id
            )
        );

        return $this->saveAll($categories);
    }

    private function saveAll(array $categories): bool
    {
        $data = [];

        foreach ($categories as $categorie) {
            $data[] = [
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom(),
                'couleur' => $categorie->getCouleur(),
                'icone' => $categorie->getIcone()
            ];
        }

        $json = json_encode(
            $data,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        if ($json === false) {
            return false;
        }

        return file_put_contents(
            self::$dataFile,
            $json,
            LOCK_EX
        ) !== false;
    }
}