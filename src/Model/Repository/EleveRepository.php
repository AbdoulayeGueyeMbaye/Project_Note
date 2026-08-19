<?php

namespace App\Model\Repository;

use App\Model\Entity\EleveEntity;
use PDO;

class EleveRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllEleves(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM eleves');
        $eleves = [];
        $stmt = $pdo->query('SELECT * FROM eleves');
        $eleves = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eleves[] = new EleveEntity(
                (int)$row['id'],
                $row['matricule'],
                $row['nom'],
                $row['prenom']
            );
        }

        return $eleves;
    }
}