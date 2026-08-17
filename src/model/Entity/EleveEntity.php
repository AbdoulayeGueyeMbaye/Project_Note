<?php

final class EleveEntity
{
    private int $id;
    private string $matricule;
    private string $nom;
    private string $prenom;

    public function __construct(int $id, string $matricule, string $nom, string $prenom)
    {
        $this->id = $id;
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMatricule(): string
    {
        return $this->matricule;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }
}