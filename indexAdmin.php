<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $adminController = new \Projet\Controllers\AdminController();
    $action = 'action';

    if (isset($_GET['action'])) 
    {   
        // si on clique sur création utilisateur
        // allez sur la page de création

        if($_GET[$action] == 'user-creation')
        {
            $adminController->usercreation();

        // Si on clique sur créer sur la page de création
        // création d'utilisateur ou erreur indiquant l'erreur

        } elseif ($_GET[$action] == 'create-user')
        { 
            
            $mail = $_POST['mail'];
            $pass = $_POST['password'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $roleutil = $_POST['role'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $adminController->createuser($firstname, $lastname, $mdp, $mail, $roleutil);

        // Si on clique sur connexion vérification des infos de connexion et allez sur la page admin/editeur
        // ou erreur indiquant l'erreur

        }  elseif ($_GET[$action] == 'connexion')
        {
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = $_POST['password'];
            if (!empty($mail) && !empty($mdp)) {
                $adminController->connexion($mail, $mdp);
            } else {
                throw new Exception('Infos manquante');
            }
        }

    } else {

        $adminController->connexionPage();

    }



} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());// faire page erreur !!!!

}