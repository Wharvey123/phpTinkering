<?php
//bootstrap es responsable de configurar i inicialitzar l'entorn de l'aplicació.
//carregar les configuracions, inicialitzar dependències com la base de dades i el router

use Dotenv\Dotenv; //carregar les variables d'entorn
use Core\App; //importar contenidor de dependències
use Core\Database\Connection; //importem la classe connection per fer la connexió
use Core\Database\Database; //importem database per fer les operacions
use Core\Route; //carregar la gestió per a l'enrutament

//carregarem les rutes
$routes = require '../routes.php';

//carreguem les variables d'entorn de forma immutable
$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load(); //carreguem variables

//enllacem l'arxiu config al contenidor com a config on tenim les variables d'entorn
App::bind('config', require '../config.php');

//enllacem la instancia database
App::bind('database', new Database(
    Connection::make(App::get('config')['database'])
));

//enllacem la instancia rutes
App::bind('router', (new Route())->define($routes));