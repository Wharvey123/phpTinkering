<?php
//definim les rutes
return [
    '/' => 'App/Controllers/LandingController@index',
    '/films' => 'App/Controllers/FilmController@index',
    '/cars' => 'App/Controllers/CarController@index',
    '/index.php' => 'App/Controllers/FilmController@index',
    '/index' => 'App/Controllers/FilmController@index',
    '/home' => 'App/Controllers/FilmController@index',
    '/films/show' => 'App/Controllers/FilmController@show',
    '/cars/show' => 'App/Controllers/CarController@show',
    '/films/create' => 'App/Controllers/FilmController@create',
    '/cars/create' => 'App/Controllers/CarController@create',
    '/films/store' => 'App/Controllers/FilmController@store',
    '/cars/store' => 'App/Controllers/CarController@store',
    '/films/edit' => 'App/Controllers/FilmController@edit',
    '/cars/edit' => 'App/Controllers/CarController@edit',
    '/films/update' => 'App/Controllers/FilmController@update',
    '/cars/update' => 'App/Controllers/CarController@update',
    '/films/delete' => 'App/Controllers/FilmController@delete',
    '/cars/delete' => 'App/Controllers/CarController@delete',
    '/films/destroy' => 'App/Controllers/FilmController@destroy',
    '/cars/destroy' => 'App/Controllers/CarController@destroy',
];
