<?php

namespace App\Core;

final class Router
{
    private array $routes = [];

    /**
     * Ajouter une route GET
     */
    public function get(string $uri, callable|array $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    /**
     * Ajouter une route POST
     */
    public function post(string $uri, callable|array $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    /**
     * Exécuter la route correspondante
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Supprimer le slash final
        $uri = rtrim($uri, '/') ?: '/';

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "Page non trouvée";
            return;
        }

        $action = $this->routes[$method][$uri];

        // Si l'action est une méthode d'un contrôleur
        if (is_array($action)) {
            [$controller, $method] = $action;

            $controllerInstance = new $controller();

            $controllerInstance->$method();

            return;
        }

        // Si l'action est une fonction anonyme
        if (is_callable($action)) {
            call_user_func($action);
        }
    }
}