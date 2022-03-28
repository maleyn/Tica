<?php
namespace Projet\Models;


use Exception;

class Manager
{
    protected function dbConnection()
    {

        try {

            $path = 'mysql:host=' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=UTF8';
            $bdd = new \PDO($path, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            return $bdd;

        } catch (Exception $e) {
            
            die('Erreur : ' . $e->getMessage());

        }
    }

}