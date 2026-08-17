<?php

final class TransfertsEntity
{
    private int $id;
    private int $eleveId;
    private int $classeOrigineId;
    private int $classeDestinationId;
    private string $dateTransfert;
    private string $motif;

    public function __construct(int $id, int $eleveId, int $classeOrigineId, int $classeDestinationId, string $dateTransfert, string $motif)
    {
        $this->id = $id;
        $this->eleveId = $eleveId;
        $this->classeOrigineId = $classeOrigineId;
        $this->classeDestinationId = $classeDestinationId;
        $this->dateTransfert = $dateTransfert;
        $this->motif = $motif;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEleveId(): int
    {
        return $this->eleveId;
    }

    public function getClasseOrigineId(): int
    {
        return $this->classeOrigineId;
    }

    public function getClasseDestinationId(): int
    {
        return $this->classeDestinationId;
    }

    public function getDateTransfert(): string
    {
        return $this->dateTransfert;
    }

    public function getMotif(): string
    {
        return $this->motif;
    }
}