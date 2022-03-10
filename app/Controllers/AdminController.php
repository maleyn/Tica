<?php 

namespace Projet\Controllers;

class AdminController
{
    /* ------------- envoi vers la page de connexion admin ------------------ */
    function connexionPage()
    {

        require 'app/Views/Admin/connexion.php';

    }

    /* ------------- envoi des roles vers la page de création utilisateur ------------------ */
    function usercreation()
    {

        $role = new \Projet\Models\AdminModel();
        $roles = $role->getRole();

        require 'app/Views/Admin/createUser.php';

    }

    function createuser($firstname, $lastname, $mdp, $mail, $roleutil)
    {

        $userManager = new \Projet\Models\AdminModel();
        $role = $userManager->getRoleId($roleutil);
        $user = $userManager->createUser($firstname, $lastname, $mdp, $mail, $role);

        require 'app/views/Admin/createConfirm.php';

    }

    function connexion($mail, $mdp)
    {
        $users = new \Projet\Models\AdminModel();
        $connexMdp = $users->getPass($mail);

        $result = $connexMdp->fetch();

        $passVerify = password_verify($mdp, $result['password']);

        if ($passVerify) 
        {
            $_SESSION['mail'] = $result['mail'];
            $_SESSION['mdp'] = $result['password'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            require 'app/Views/Admin/tableauDeBord.php';
        }

        else {
            echo '<h1>Identifiant ou mot de passe incorrect</h1>';
            require 'app/Views/Admin/connexion.php';
        }
    }
}