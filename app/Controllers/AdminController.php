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
        $roles = $role->getRole();

        require 'app/Views/Admin/createUser.php';

    }

    function createuser($firstname, $lastname, $mdp, $mail, $roleutil)
    {
        $userManager = new \Projet\Models\AdminModel();
        $roleutil = substr($roleutil, 1);
        $role = $userManager->getRoleId($roleutil);
        $user = $userManager->createUser($firstname, $lastname, $mdp, $mail, $role);

        require 'app/views/Admin/createConfirm.php';

    }
}