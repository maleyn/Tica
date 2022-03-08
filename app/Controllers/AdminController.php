<?php 

namespace Projet\Controllers;

class AdminController
{
    /* ------------- envoi vers la page de connexion admin ------------------ */
    function connexion()
    {

        require 'app/Views/Admin/connexion.php';

    }

    /* ------------- envoi des roles vers la page de création utilisateur ------------------ */
    function usercreation()
    {

        $role = new \Projet\Models\AdminModel();
        $data = $role->getRole();

        require 'app/Views/Admin/createUser.php';

    }

    function createuser($firstname, $lastname, $mdp, $mail, $role)
    {
        $userManager = new \Projet\Models\AdminModel();
        var_dump($role);
         $user = $userManager->createUser($firstname, $lastname, $mdp, $mail, $role);

         require 'app/views/Admin/createUser.php';

    }
}