<?php

final class AnneeScolaireEntity
{
    private int $id;
    private string $libelle;
    private bool $estActive;

    public function __construct(int $id, string $libelle, bool $estActive)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->estActive = $estActive;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function isEstActive(): bool
    {
        return $this->estActive;
    }
}