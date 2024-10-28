<?php

namespace App\Models;

use Core\App;

class Car
{
    protected static $table = 'cars';

    // Function to retrieve all cars
    public static function getAll()
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    // Function to find a specific car by id
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    // Function to create a new car
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $query = 'INSERT INTO ' . self::$table . ' (make, model, year, price, description) 
                  VALUES (:make, :model, :year, :price, :description)';
        $statement = $db->prepare($query);
        $statement->bindParam(':make', $data['make']);
        $statement->bindParam(':model', $data['model']);
        $statement->bindParam(':year', $data['year']);
        $statement->bindParam(':price', $data['price']);
        $statement->bindParam(':description', $data['description']);
        $statement->execute();
    }

    // Function to update an existing car
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $query = 'UPDATE ' . self::$table . ' SET 
                  make = :make, model = :model, year = :year, price = :price, description = :description 
                  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':make', $data['make']);
        $statement->bindParam(':model', $data['model']);
        $statement->bindParam(':year', $data['year']);
        $statement->bindParam(':price', $data['price']);
        $statement->bindParam(':description', $data['description']);
        $statement->execute();
    }

    // Function to delete a car by id
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . self::$table . ' WHERE id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}
