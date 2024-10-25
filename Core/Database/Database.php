<?php

namespace Core\Database;

use PDO;

class Database
{
    protected $connection; //guardem instancia de la classe pdo

    //creem constructor reb una instancia pdo per a realitzar les consultes
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    //funcio per a la connexió
    public function getConnection()
    {
        return $this->connection;
    }


}