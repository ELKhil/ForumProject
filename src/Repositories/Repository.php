<?php

namespace App\Repositories;

class Repository
{
    protected string $tableName;
    protected \PDO $connexion;


    public function __construct(string $tableName) {
        $this->tableName = $tableName;
        $this->connexion = new \PDO("mysql:host=localhost;dbname=forum-framework", "root");
    }

    /**
     * Permet la fermeture de la connexion et de libérer la base de données
     */
    public function __destruct()
    {
        unset($this->connexion);
    }


}