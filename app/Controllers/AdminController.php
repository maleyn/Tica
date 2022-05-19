<?php 

namespace Projet\Controllers;

class AdminController
{
    /* ------------- envoi vers la page de connexion admin ------------------ */
    public function connexionPage()
    {

        require 'app/Views/Admin/connexion.php';

    }

    /* ------------- envoi des roles vers la page de création utilisateur ------------------ */
    public function usercreation()
    {

        $role = new \Projet\Models\AdminModel();
        $roles = $role->getRole();

        require 'app/Views/Admin/createUser.php';

    }
    /* ------------ Création des utilisateurs d'administration du site ------------*/
    public function createuser($userArray)
    {

        $userManager = new \Projet\Models\AdminModel();
        $idRole = $userManager->getRoleId($userArray['role']);
        $arrayId = ["role" => $idRole[0]];
       
        // remplace la valeur de role du tableau userarray par son id correspondante
        $userArrayMod = array_replace($userArray, $arrayId);
       
        $userManager->createUser($userArrayMod);

    }
    /* -------------- Connexion au tableau de bord du site ------------- */
    public function connexion($mail, $mdp)
    {
        $data = new \Projet\Models\AdminModel();
        $connexMdp = $data->getPass($mail);
        $stats = $data->getCountTotal();

        $result = $connexMdp->fetch();
        if(!empty($result)) {
            
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

            require 'app/Views/Admin/dashboard.php';

        } else {

            echo "<h2 class='center text-red'>Mot de passe invalide</h2>";
            require 'app/Views/Admin/connexion.php';
        }
            
        } else {

            echo "<h2 class='center text-red'>E-mail invalide</h2>";
            require 'app/Views/Admin/connexion.php';

        }
    }
    
    /* -------------- Récupération des mails de contact ------------- */

    public function mailContact()
    {
        $contactMail = new \Projet\Models\ContactModel();
        $allContactMail = $contactMail->getContactMails();

        require 'app/Views/Admin/mailView.php';
    }

    /* -------------- Affichage du tableau de bord  ------------- */

    public function dashboard()
    {
        $data = new \Projet\Models\AdminModel();
        $mailNbr = new \Projet\Models\ContactModel();
        $mailCount = $mailNbr->getMailsCount();
        $stats = $data->getCountTotal();

        require 'app/Views/Admin/dashboard.php';
    }

    /* -------------- Affichage de la page des mails  ------------- */

    public function mailSolo($idMail)
    {
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $mailSolo = $mail->getMail($idMail);

        require 'app/Views/Admin/mailPage.php';
    }

    /* -------------- Suppression d'un mail ----------------------- */

    public function mailDelete($idMail)
    {
        $mail = new \Projet\Models\ContactModel();
        $mail->deleteMail($idMail);

        $mailCount = $mail->getMailsCount();
        $allContactMail = $mail->getContactMails();

        require 'app/Views/Admin/mailView.php';
    }
    /* ---------------Affichage et modification des comptes ----------------------- */

    public function accountView($idaccount, $firstname, $lastname, $confirmUpdate)
    {

        $data = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();

        $allUsers = $data->getUsersInfos();
        $roleUser = $data->getRoleUser($idaccount);
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/accountView.php';
    }

    /* ---------------Mise à jour du compte personnel ----------------------- */

    public function updateSelf($idaccount, $lastname, $firstname)
    {
        
        $data = new \Projet\Models\AdminModel();
        $data->updateSelfInfos($idaccount, $lastname, $firstname);

        $confirmUpdate = "Mise à jour effectué";
        return $confirmUpdate;
        
    }

    /* ---------------Suppression d'un compte utilisateur  ----------------------- */

    public function userDelete($idUser)
    {
        $data = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();

        $data->deleteThisUser($idUser);

    }

    /* ---------------vue d'un compte utilisateur  ----------------------- */

    public function userView($idUser, $confirmUpdate)
    {
        $data = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();

        $roles = $data->getRole();
        $user = $data->getUserInfos($idUser);

        require 'app/Views/Admin/accountPage.php';
    }

     /* ---------------Mise à jour d'un compte utilisateur  ----------------------- */

    public function updateUser($idUser, $lastname, $firstname, $role)
    {

        $data = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();

        $roleid = $data->getRoleId($role);
        
        $data->updateUserInfos($idUser, $lastname, $firstname, $roleid);

        $confirmUpdate = "Mise à jour effectué";
        return $confirmUpdate;
    }

    /* ---------------Affichage et modification de la page Accueil ----------------------- */

    public function homeView()
    {
        $getFront = new \Projet\Models\FrontModel();
        $mail = new \Projet\Models\ContactModel();
        $frontView = $getFront->getFront();
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/homePage.php';
    }

    /* ---------------Mise à jour de la page Accueil ----------------------- */

    public function homeUpdate($dataFront)
    {
        $front = new \Projet\Models\FrontModel();
        $mail = new \Projet\Models\ContactModel();
        $frontUpdate = $front->updateFront($dataFront);
        $frontView = $front->getFront();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour effectué";

        require 'app/Views/Admin/homePage.php';
    }

    /* ---------------Récupération du chemin de l'image de la page d'acceuil ----------------------- */

    public function homeViewUrl()
    {
        $frontUrl = new \Projet\Models\FrontModel();
        $frontDataUrl = $frontUrl->getFrontUrl();


        return $frontDataUrl;
    }

    // récupération d'un id en fonction de sa table et nom

    public function idView($table, $name)
    {
        $data = new \Projet\Models\AdminModel();
        $idData = $data->getIdTable($table, $name);

        return $idData;
    }

    // Personnalisation de la page catégories

    // Récupère toutes les infos

    public function getInfosCategories($confirmUpdate)
    {
        $data = new \Projet\Models\PaintModel();
        $mail = new \Projet\Models\ContactModel();
        
        $styles = $data->getStyles();
        $types = $data->getTypes();
        $frames = $data->getFrames();
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/categoriesView.php';
        
    }

    // Suppression d'un style de peinture

    public function styleDelete($styleId)
    {
        $data = new \Projet\Models\PaintModel();
        $data->deleteStyleBdd($styleId);
        $confirmUpdate = "Suppression d'un style effectué";
        $this->getInfosCategories($confirmUpdate);
        
    }

    // Suppression d'un type de peinture

    public function styleAjout($style)
    {
        $data = new \Projet\Models\PaintModel();
        $data->insertStyleBdd($style);
        $confirmUpdate = "Ajout d'un type effectué";
        $this->getInfosCategories($confirmUpdate);
    
    }

    // Suppression d'un type de peinture

    public function typeDelete($typeId)
    {
        $data = new \Projet\Models\PaintModel();
        $data->deleteTypeBdd($typeId);
        $confirmUpdate = "Suppression d'un type effectué";
        $this->getInfosCategories($confirmUpdate);
        
    }
    
    // Ajout d'un type de peinture

    public function typeAjout($type)
    {
        $data = new \Projet\Models\PaintModel();
        $data->insertTypeBdd($type);
        $confirmUpdate = "Ajout d'un type effectué";
        $this->getInfosCategories($confirmUpdate);

    }

    // Ajout d'un câdre de peinture 

    public function frameAjout($frame)
    {
        $data = new \Projet\Models\PaintModel();
        $data->insertFrameBdd($frame);
        $confirmUpdate = "Ajout d'un câdre effectué";
        $this->getInfosCategories($confirmUpdate);
    }

    // Suppresion d'un câdre de peinture

    public function frameDelete($frameId)
    {
        
        $data = new \Projet\Models\PaintModel();
        $data->deleteFrameBdd($frameId);
        $confirmUpdate = "Suppression d'un câdre effectué";
        $this->getInfosCategories($confirmUpdate);
        
    }
}