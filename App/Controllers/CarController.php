<?php

namespace App\Controllers;

use App\Models\Car; // Changed from Film to Car

class CarController // Changed from FilmController to CarController
{
    //funcio index
    public function index()
    {
        //obtenim tots els cotxes
        $cars = Car::getAll(); // Changed from Film to Car

        //pasem els cotxes a la vista
        return view('cars/index', ['cars' => $cars]); // Changed from films to cars
    }

    public function show($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /cars');
            exit;
        }
        //busquem el cotxe
        $car = Car::find($id); // Changed from Film to Car
        //si no ens passen cap cotxe mostrar 404
        if (!$car) { // Changed from film to car
            require '../../resources/views/errors/404.blade.php';
            return;
        }
        //retornem la vista i li passem el cotxe indicat
        return view('cars/show', ['car' => $car]); // Changed from film to car
    }

    //funcio per anar a la vista create
    public function create()
    {
        return view('cars/create'); // Changed from films to cars
    }

    //funcio per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        //cridem funcio create del model
        Car::create($data); // Changed from Film to Car
        //retornar a la vista principal
        header('location: /cars');
        exit;
    }

    //funcio per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /cars');
            exit;
        }

        //busquem el cotxe
        $car = Car::find($id); // Changed from Film to Car

        //si no ens passen cap cotxe mostrar 404
        if (!$car) { // Changed from film to car
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem el cotxe indicat
        return view('cars/edit', ['car' => $car]); // Changed from film to car
    }

    //funcio update per a modificar el cotxe a la base de dades
    public function update($id, $data)
    {
        //modifiquem
        Car::update($id, $data); // Changed from Film to Car

        //retonem a la pàgina principal
        header('location: /cars');
        exit;
    }

    //funcio per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /cars');
            exit;
        }

        //busquem el cotxe
        $car = Car::find($id); // Changed from Film to Car
        //retornem la vista en el cotxe
        return view('cars/delete', ['car' => $car]); // Changed from film to car

    }

    //funcio per eliminar el cotxe de la base de dades
    public function destroy($id)
    {
        //utilizem la funcio delete del model
        Car::delete($id); // Changed from Film to Car

        //retornar a la vista
        header('location: /cars');
    }
}