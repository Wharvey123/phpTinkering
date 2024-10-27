<?php

namespace App\Models;

use Core\App;

class Car // Changed from Film to Car
{
    protected static $table = 'cars'; // Changed from films to cars

    //funcio per a que torne tots els cotxes
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    //funcio per a buscar un cotxe
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch();
    }

    //funcio create
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO ' . static::$table . " (marca, model, any_de_fabricacio, preu, descripcio) VALUES (:marca, :model, :any_de_fabricacio, :preu, :descripcio)"); // Updated fields
        $statement->bindValue(':marca', $data['marca']); // Changed from name to marca
        $statement->bindValue(':model', $data['model']); // Changed from director to model
        $statement->bindValue(':any_de_fabricacio', $data['any_de_fabricacio']); // Changed from year to any_de_fabricacio
        $statement->bindValue(':preu', $data['preu']); // Added preu
        $statement->bindValue(':descripcio', $data['descripcio']); // Changed from description to descripcio
        $statement->execute();
    }

    //funcio update
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE " . static::$table . " SET marca = :marca, model = :model, any_de_fabricacio = :any_de_fabricacio, preu = :preu, descripcio = :descripcio WHERE id = :id"); // Updated fields
        $statement->bindValue(':id', $id);
        $statement->bindValue(':marca', $data['marca']); // Changed from name to marca
        $statement->bindValue(':model', $data['model']); // Changed from director to model
        $statement->bindValue(':any_de_fabricacio', $data['any_de_fabricacio']); // Changed from year to any_de_fabricacio
        $statement->bindValue(':preu', $data['preu']); // Added preu
        $statement->bindValue(':descripcio', $data['descripcio']); // Changed from description to descripcio
        $statement->execute();
    }

    //funcio delete
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}