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

    /* ---------------Affichage et modification de la page Accueil ----------------------- */

    function homeView()
    {
        $getFront = new \Projet\Models\FrontModel();
        $mail = new \Projet\Models\ContactModel();
        $frontView = $getFront->getFront();
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/homePage.php';
    }

    function homeUpdate($dataFront)
    {
        $front = new \Projet\Models\FrontModel();
        $mail = new \Projet\Models\ContactModel();
        $frontUpdate = $front->updateFront($dataFront);
        $frontView = $front->getFront();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour effectué";

        require 'app/Views/Admin/homePage.php';
    }

    function homeViewUrl()
    {
        $frontUrl = new \Projet\Models\FrontModel();
        $frontDataUrl = $frontUrl->getFrontUrl();


        return $frontDataUrl;
    }

    /* ----------- Affichage et modification de la page Galerie ----------- */

    function galerieView()
    {
        $galerie = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();
        $paints = $galerie->getGalerie();
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/galeriePage.php';
    }

    function paintView($idpaint)
    {
        $galerie = new \Projet\Models\FrontModel();
        $mail = new \Projet\Models\ContactModel();
        $paint = $galerie->getGaleriePaint($idpaint);
        $painters = $galerie->getPaintersBasics();
        $styles = $galerie->getStyles();
        $types = $galerie->getTypes();
        $frames = $galerie->getFrames();
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/paintPage.php';
    }

    function paintUpdate($dataPaint)
    {
        $galerie = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();
        $paintsupdate = $galerie->updatePaints($dataPaint);
        $paints = $galerie->getGalerie();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour / Ajout effectué";

        require 'app/Views/Admin/galeriePage.php';
    }

    function galerieViewUrl($paintId)
    {
        $galerieUrl = new \Projet\Models\AdminModel();
        $galerieDataUrl = $galerieUrl->getGalerieUrl($paintId);

        return $galerieDataUrl;
    }

    function idView($table, $name)
    {
        $data = new \Projet\Models\AdminModel();
        $idData = $data->getIdTable($table, $name);

        return $idData;
    }

    function paintDelete($idPaint)
    {
        $data = new \Projet\Models\AdminModel();
        $data->deletePaint($idPaint);

    }

/* ----------- Affichage et modification de la page Artistes ----------- */

    function paintersView()
    
    {
        $data = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $dataPainter = $data->getPaintersInfos();

        require 'app/Views/Admin/paintersView.php';
    }
    
    function painterSoloView($idPainter)
    
    {
        $data = new \Projet\Models\FrontModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $paintersStyle = $data->getPainterStyle($idPainter);
        $styles = $data->getStyles();
        $dataPainter = $data->getPainterFullInfos($idPainter);
        
        require 'app/Views/Admin/painterPage.php';
    }

    function painterViewUrl($painterId)
    {
        $painterUrl = new \Projet\Models\AdminModel();
        $painterDataUrl = $painterUrl->getPainterUrl($painterId);
      
        return $painterDataUrl;
    }

    function painterUpdate($dataPainter)
    {
        $painters = new \Projet\Models\AdminModel();
        $mail = new \Projet\Models\ContactModel();
        $painterupdate = $painters->updatePainter($dataPainter);
        $dataPainter = $painters->getPaintersInfos();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour / Ajout effectué";

        require 'app/Views/Admin/paintersView.php';
    }
 
    function painterDelete($idPainter)
    {
        $data = new \Projet\Models\AdminModel();
        $data->deletePainter($idPainter);

    }

}