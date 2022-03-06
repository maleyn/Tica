<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $adminController = new \Projet\Controllers\AdminController();

    if (isset($_GET['action'])) 
    { 
        if($_GET['action'] == 'user-creation')
        {
            $adminController->usercreation();

        }

    } else {

        $adminController->connexion();

    }



} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());// faire page erreur !!!!

}