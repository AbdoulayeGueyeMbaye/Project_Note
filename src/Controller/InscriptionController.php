<?php

namespace App\Controller;

final class InscriptionController
{
    public function inscription(): void
    {
        require_once dirname(__DIR__) . '/View/inscription.html.php';
    }
}