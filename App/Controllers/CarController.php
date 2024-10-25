<?php

namespace App\Controllers;

use App\Models\Car;

class CarController
{
    //funció index
    public function index()
    {
        //obtenim tots els cotxes
        $cars = Car::getAll();

        //pasem els cotxes a la vista
        return view('cars/index', ['cars' => $cars]);
    }

    //funció per anar a la vista create
    public function create()
    {
        return view('cars/create');
    }

    //funció per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        //cridem la funció create del model
        Car::create($data);
        //retornem a la vista principal
        header('location: /cars');
        exit;
    }

    //funció per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /cars');
            exit;
        }

        //busquem el cotxe
        $car = Car::find($id);

        //si no ens passen cap cotxe, mostrar 404
        if (!$car) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem el cotxe indicat
        return view('cars/edit', ['car' => $car]);
    }

    //funció update per modificar el cotxe a la base de dades
    public function update($id, $data)
    {
        //modifiquem
        Car::update($id, $data);

        //retornem a la pàgina principal
        header('location: /cars');
        exit;
    }

    //funció per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /cars');
            exit;
        }

        //busquem el cotxe
        $car = Car::find($id);

        //retornem la vista en el cotxe
        return view('cars/delete', ['car' => $car]);
    }

    //funció per eliminar el cotxe de la base de dades
    public function destroy($id)
    {
        //utilitzem la funció delete del model
        Car::delete($id);

        //retornem a la vista principal
        header('location: /cars');
    }
}
