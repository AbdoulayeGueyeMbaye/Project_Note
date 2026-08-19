<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;
use App\Controller\InscriptionController;

$router = new Router();

$router->get('/', [InscriptionController::class, 'inscription']);
$router->get('/inscription', [InscriptionController::class, 'inscription']);

$router->dispatch();
