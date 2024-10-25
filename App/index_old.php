<?php

use Core\App;

$greeting = "Hello";

    $a = 3;
    $b = 2;
    //                $films = [
    //                        "Dune",
    //                        "Star Wars",
    //                        "Blade Runner 2049",
    //                        "Mad Max: Fury road",
    //                        "Avatar",
    //                        "2001: a space odyssey"
    //                ];
//    $films = [
//        [
//            "name" => "Dune",
//            "director" => "Denis Villeneuve",
//            "year" => "2020",
//        ],   [
//            "name" => "Star Wars",
//            "director" => "George Lucas",
//            "year" => "1977",
//        ], [
//            "name" => "Blade Runner 2049",
//            "director" => "Denis Villeneuve",
//            "year" => "2017",
//        ], [
//            "name" => "Mad Max: Fury road",
//            "director" => "George Miller",
//            "year" => "2015",
//        ], [
//            "name" => "Avatar",
//            "director" => "James Cameron",
//            "year" => "2009",
//        ], [
//            "name" => "2001: a space odyssey",
//            "director" => "Stanley Kubrick",
//            "year" => "1968",
//        ]
//    ];
//    var_dump($films);
//
    //consultem els registres de la taula films de la bd utilitzant App
    $films = App::get('database')->selectAll('films');

//    function filterByDirector($films, $director) {
//        $filteredDirectors = [];
//        foreach ($films as $film) {
//            if ($film["director"] === $director) {
//                $filteredDirectors[] = $film;
//            }
//        }
//        return $filteredDirectors;
//    }
//    //buscar les pelis a partir del 2000
//    function filterByYear($films) {
//        $filteredDirectors = [];
//        foreach ($films as $film) {
//            if ($film["year"] >= 2000) {
//                $filteredDirectors[] = $film;
//            }
//        }
//        return $filteredDirectors;
//    }
//
//    $filteredFilms = array_filter($films, function ($film) {
//        return $film["year"] >= 2010 && $film["year"] <= 2020;
//    });

    //cridem a la vista
    require '../resources/views/index.blade.php';
