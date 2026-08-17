<?php

final class InscriptionEntity
{
    private int $id;
    private int $eleveId;
    private int $classeId;
    private int $anneeScolaireId;

    public function __construct(int $id, int $eleveId, int $classeId, int $anneeScolaireId)
    {
        $this->id = $id;
        $this->eleveId = $eleveId;
        $this->classeId = $classeId;
        $this->anneeScolaireId = $anneeScolaireId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEleveId(): int
    {
        return $this->eleveId;
    }

    public function getClasseId(): int
    {
        return $this->classeId;
    }

    public function getAnneeScolaireId(): int
    {
        return $this->anneeScolaireId;
    }
}