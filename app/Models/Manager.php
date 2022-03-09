<?php
namespace Projet\Models;

use Exception;

class Manager
{
    protected function dbConnection()
    {

        try {
            
            $bdd = new \PDO('mysql:host=localhost;dbname=tica;charset=utf8', 'root', '');
            return $bdd;

        } catch (Exception $e) {
            
            die('Erreur : ' . $e->getMessage());

        }
    }

}