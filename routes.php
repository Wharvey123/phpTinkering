<?php
//definim les rutes
return [
    '/' => 'App/Controllers/LandingController@index',
    '/films' => 'App/Controllers/FilmController@index',
    '/cars' => 'App/Controllers/CarController@index',
    '/index.php' => 'App/Controllers/FilmController@index',
    '/index' => 'App/Controllers/FilmController@index',
    '/home' => 'App/Controllers/FilmController@index',
    '/show' => 'App/Controllers/FilmController@show',
    '/create' => 'App/Controllers/FilmController@create',
    '/store' => 'App/Controllers/FilmController@store',
    '/edit' => 'App/Controllers/FilmController@edit',
    '/update' => 'App/Controllers/FilmController@update',
    '/delete' => 'App/Controllers/FilmController@delete',
    '/destroy' => 'App/Controllers/FilmController@destroy',
];