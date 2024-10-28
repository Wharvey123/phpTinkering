<?php
//Fitxer per gestionar les rutes
namespace Core;

use RuntimeException;

class Route
{
    //creem array en les rutes
    protected $routes = [];

    //creem funcio per afegir rutes a l'array
    public function register($route)
    {
        $this->routes[] = $route;
    }

    //funcio per rebre un array de rutes i assignar a la propietat routes
    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    //funcio per redirigir la url solicitada a un controlador
    public function redirect($uri)
    {
        //partim la url
        $parts = explode('/', trim($uri,'/'));

        //Indiquem rutes per a Landings, Films i Cars
        $controllerLanding = 'App\Controllers\LandingController';
        $controllerFilm = 'App\Controllers\FilmController';
        $controllerCar = 'App\Controllers\CarController';

        //Inici
        if ($uri === '/') {
            require '../App/Controllers/LandingController.php';
            $controllerInstance = new $controllerLanding();
            return $controllerInstance->index();
        }

        //Films
        if ($parts[0] === 'films') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controllerFilm();

            //Gestionem les rutes de films
            switch ($parts[1] ?? '') {
                case '':
                    return $controllerInstance->index();
                case 'show':
                    return $controllerInstance->show($parts[2] ?? null);
                case 'create':
                    return $controllerInstance->create();
                case 'store':
                    return $controllerInstance->store($_POST);
                case 'edit':
                    return $controllerInstance->edit($parts[2] ?? null);
                case 'update':
                    return $controllerInstance->update($parts[2] ?? null, $_POST);
                case 'delete':
                    return $controllerInstance->delete($parts[2] ?? null);
                case 'destroy':
                    return $controllerInstance->destroy($_POST['id'] ?? null);
            }
        }

        //Cars
        if ($parts[0] === 'cars') {
            require '../App/Controllers/CarController.php';
            $controllerInstance = new $controllerCar();

            //Gestionem les rutes de cars
            switch ($parts[1] ?? '') {
                case '':
                    return $controllerInstance->index();
                case 'show':
                    return $controllerInstance->show($parts[2] ?? null);
                case 'create':
                    return $controllerInstance->create();
                case 'store':
                    return $controllerInstance->store($_POST);
                case 'edit':
                    return $controllerInstance->edit($parts[2] ?? null);
                case 'update':
                    return $controllerInstance->update($parts[2] ?? null, $_POST);
                case 'delete':
                    return $controllerInstance->delete($parts[2] ?? null);
                case 'destroy':
                    return $controllerInstance->destroy($_POST['id'] ?? null);
            }
        }

        //si no es cap dels anteriors retornem la vista 404
        return require '../resources/views/errors/404.blade.php';
    }
}
