<?php

namespace App\Model\Repository;


use App\Model\Entity\ClasseEntity;
use PDO;

class ClasseRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllClasses(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM classes');
        $classes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $classes[] = new ClasseEntity(
                (int)$row['id'],
                $row['libelle']
            );
        }

        return $classes;
    }
}

