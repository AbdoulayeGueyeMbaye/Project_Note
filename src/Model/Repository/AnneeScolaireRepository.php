<?php

namespace App\Model\Repository;


use App\Model\Entity\AnneeScolaireEntity;
use PDO;




class AnneeScolaireRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllAnneesScolaires(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM annees_scolaires');
        $anneesScolaires = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $anneesScolaires[] = new AnneeScolaireEntity(
                (int)$row['id'],
                $row['libelle'],
                (bool)$row['est_active']
            );
        }

        return $anneesScolaires;
    }
}