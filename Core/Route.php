<?php

namespace Core;

use RuntimeException;

class Route
{
    protected $routes = [];

    // Register routes
    public function register($route)
    {
        $this->routes[] = $route;
    }

    // Define routes and assign to the property
    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    // Redirect the requested URL to a specific controller method
    public function redirect($uri)
    {
        // Split the URL into parts
        $parts = explode('/', trim($uri, '/'));

        // Define controllers for Landings, Films, and Cars
        $controllerLanding = 'App\Controllers\LandingController';
        $controllerFilm = 'App\Controllers\FilmController';
        $controllerCar = 'App\Controllers\CarController';

        // Handle landing page
        if ($uri === '/') {
            require '../App/Controllers/LandingController.php';
            $controllerInstance = new $controllerLanding();
            return $controllerInstance->index();
        }

        // Handle Film Routes
        if ($parts[0] === 'films') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controllerFilm();

            switch ($parts[1] ?? '') {
                case '':
                    return $controllerInstance->index();
                case 'show':
                    return $controllerInstance->show($parts[2] ?? null);
                case 'create':
                    return $controllerInstance->create();
                case 'store':
                    return $controllerInstance->store($_POST); // Ensure POST request
                case 'edit':
                    return $controllerInstance->edit($parts[2] ?? null);
                case 'update':
                    return $controllerInstance->update($parts[2] ?? null, $_POST); // POST for data submission
                case 'delete':
                    return $controllerInstance->delete($parts[2] ?? null); // Direct delete view
                case 'destroy':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POST for delete
                        return $controllerInstance->destroy($_POST['id'] ?? null);
                    }
            }
        }

        // Handle Car Routes
        if ($parts[0] === 'cars') {
            require '../App/Controllers/CarController.php';
            $controllerInstance = new $controllerCar();

            switch ($parts[1] ?? '') {
                case '':
                    return $controllerInstance->index();
                case 'show':
                    return $controllerInstance->show($parts[2] ?? null);
                case 'create':
                    return $controllerInstance->create();
                case 'store':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POST for storing new data
                        return $controllerInstance->store($_POST);
                    }
                    break;
                case 'edit':
                    return $controllerInstance->edit($parts[2] ?? null);
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POST for update
                        return $controllerInstance->update($parts[2] ?? null, $_POST);
                    }
                    break;
                case 'delete':
                    return $controllerInstance->delete($parts[2] ?? null); // Direct delete view
                case 'destroy':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POST for delete action
                        return $controllerInstance->destroy($_POST['id'] ?? null);
                    }
                    break;
            }
        }

        // Return 404 view if route not found
        return require '../resources/views/errors/404.blade.php';
    }
}
