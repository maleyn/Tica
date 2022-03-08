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

        } elseif ($_GET['action'] == 'create-user'){ 
            
            $mail = $_POST['mail'];
            $pass = $_POST['password'];
            $lastname = $firstname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $role = 1;
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $adminController->createuser($firstname, $lastname, $mdp, $mail, $role);

        }

    } else {

        $adminController->connexion();

    }



} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());// faire page erreur !!!!

}