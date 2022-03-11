<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $adminController = new \Projet\Controllers\AdminController();
    $action = 'action';

    if (isset($_GET['action'])) 
    {   
        
        // allez sur la page de création d'utilisateur

        if($_GET[$action] == 'user-creation')
        {
            $adminController->usercreation();

        // Créer un utilisateur

        } elseif ($_GET[$action] == 'create-user')

        { 
            
            $pass = $_POST['password'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $userArray = [
                    "prenom" => $_POST['firstname'], 
                    "nom" => $_POST['lastname'],
                    "mdp" => $mdp, 
                    "mail" => $_POST['mail'], 
                    "role" => $_POST['role']
                    ];

            $adminController->createuser($userArray);


        // Connexion au tableau de bord
       
        }  elseif ($_GET[$action] == 'connexion')

        {
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = $_POST['password'];
            if (!empty($mail) && !empty($mdp)) {
                $adminController->connexion($mail, $mdp);
            } else {
                throw new Exception('Infos manquante');
            }

        // Affichage des mails du tableau de bord

        } elseif ($_GET[$action] == 'mail')

        {
            $adminController->mailContact();

        } elseif ($_GET[$action] == 'dashboard')

        {
            $adminController->dashboard();
        } elseif ($_GET[$action] == 'mailSolo')

        {
            $idMail = $_GET['id'];
            $adminController->mailSolo($idMail);

        } elseif ($_GET[$action] == 'mailDelete')

        {
            $idMail = $_GET['id'];
            $adminController->mailDelete($idMail);
        }

    } else {

        $adminController->connexionPage();

    }



} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());// faire page erreur !!!!

}