<?php

namespace App\Models;

use Core\App;

class Car
{
    protected static $table = 'cars'; // Nom de la taula

    // Funció per a obtenir tots els cotxes
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    // Funció per a buscar un cotxe per ID
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    // Funció create per afegir un nou cotxe
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO '. static::$table . "(marca, model, year, preu) VALUES (:marca, :model, :year, :preu)");
        $statement->bindValue(':marca', $data['marca']);
        $statement->bindValue(':model', $data['model']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':preu', $data['preu']);
        $statement->execute();
    }

    // Funció update per actualitzar la informació d'un cotxe
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE ". static::$table . " SET marca = :marca, model = :model, year = :year, preu = :preu WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':marca', $data['marca']);
        $statement->bindValue(':model', $data['model']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':preu', $data['preu']);
        $statement->execute();
    }

    // Funció delete per eliminar un cotxe
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM '. static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

}
