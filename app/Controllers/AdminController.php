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
    /* ------------ Création des utilisateurs d'administration du site ------------*/
    function createuser($userArray)
    {

        $userManager = new \Projet\Models\AdminModel();
        $idRole = $userManager->getRoleId($userArray['role']);
        $arrayId = ["role" => $idRole[0]];
       
        // remplace la valeur de role du tableau userarray par son id correspondante
        $userArrayMod = array_replace($userArray, $arrayId);
       
        $user = $userManager->createUser($userArrayMod);

        require 'app/views/Admin/createConfirm.php';

    }
    /* -------------- Connexion au tableau de bord du site ------------- */
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

            $mailNbr = new \Projet\Models\ContactModel();
            $mailCount = $mailNbr->getMailsCount();

            require 'app/Views/Admin/tableauDeBord.php';
        }

        else {

            require 'app/Views/Admin/connexion.php';

        }
    }
    /* -------------- Récupération des mails de contact ------------- */
    function mailContact()
    {
        $contactMail = new \Projet\Models\ContactModel();
        $allContactMail = $contactMail->getContactMails();

        require 'app/Views/Admin/mailView.php';
    }

    function dashboard()
    {
        $mailNbr = new \Projet\Models\ContactModel();
        $mailCount = $mailNbr->getMailsCount();

        require 'app/Views/Admin/tableauDeBord.php';
    }

    function mailSolo($idMail)
    {
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $mailSolo = $mail->getMail($idMail);

        require 'app/Views/Admin/mailSolo.php';
    }

    function mailDelete($idMail)
    {
        $mail = new \Projet\Models\ContactModel();
        $mail->deleteMail($idMail);
        $mailCount = $mail->getMailsCount();
        $allContactMail = $mail->getContactMails();

        require 'app/Views/Admin/mailView.php';
    }
}