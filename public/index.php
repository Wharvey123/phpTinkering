<?php
//require "App/index_old.php";
//require "resources/views/index_old.blade.php";

use Core\App;

// mirar info del php del sistema en phpinfo();

//carreguem el fitxer autoload que carrega les dependencies definides al composer.json
//i les classes que es troben als espais de noms del projecte
require '../vendor/autoload.php';  //incloem fitxer autoload

//carreguem bootsrap que realitza la configuració inicial del framework
require '../Core/bootstrap.php';

//gestionem les rutes del projecte i l'enrutador busca la ruta a config i rederigeix la solicitud al controlador
App::get('router')->redirect($_SERVER['REQUEST_URI']);

