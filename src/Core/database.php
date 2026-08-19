<?php

namespace App\Core;

use PDO;
use PDOException;

final class Database
{
    private static ?Database $instance = null;

    private PDO $pdo;

    private function __construct()
    {
        $host = 'localhost';
        $port = '5432';
        $dbname = 'gestion_rh';
        $user = 'abdellah';
        $password = 'Agm1996';

        try {
            $this->pdo = new PDO(
                "pgsql:host=$host;port=$port;dbname=$dbname",
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}