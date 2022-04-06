<?php 

namespace Projet\Controllers;

class PainterController
{
    /* ----------- Affichage et modification des pages artistes ----------- */

    // Injection des infos basiques de toutes les artistes dans la page paintersView

    function paintersView()
    
    {
        $data = new \Projet\Models\PainterModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $dataPainter = $data->getPaintersInfos();

        require 'app/Views/Admin/paintersView.php';
    }

    // Injection des infos de l'artiste spécifié dans la page painterPage

    function painterSoloView($idPainter)
    
    {
        $dataPaint = new \Projet\Models\PaintModel();
        $dataPainter = new \Projet\Models\PainterModel();
        $mail = new \Projet\Models\ContactModel();
        
        $mailCount = $mail->getMailsCount();
        $paintersStyle = $dataPainter->getPainterStyle($idPainter);
        $styles = $dataPaint->getStyles();
        $dataPainter = $dataPainter->getPainterFullInfos($idPainter);
        
        require 'app/Views/Admin/painterPage.php';
    }

     // Récupération de l'url de l'image actuelle d'un artiste

    function painterViewUrl($painterId)
    {
        $painterUrl = new \Projet\Models\PainterModel();
        $painterDataUrl = $painterUrl->getPainterUrl($painterId);
      
        return $painterDataUrl;
    }

    // Injection dans le model d'un artiste de nouvelles données du form 

    function painterUpdate($dataPainter)
    {
        $painters = new \Projet\Models\PainterModel();
        $mail = new \Projet\Models\ContactModel();
        $painterupdate = $painters->updatePainter($dataPainter);
        $dataPainter = $painters->getPaintersInfos();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour / Ajout effectué";

        require 'app/Views/Admin/paintersView.php';
    }

    // Injection dans le model des données du style d'un artiste 

    function painterStyleUpdate($stylesId, $painterId)
    {
        $styles = new \Projet\Models\PainterModel();
        $stylesInfos = $styles->getPainterStyleInfos($painterId);
        $stylesupdate = $styles->updateStyle($stylesId, $painterId, $stylesInfos);
    }
    
    // Récupération de tout les styles de peinture

    function getStyle()
    {
        $data = new \Projet\Models\PaintModel();
        $styles = $data->getStyles();

        return $styles;
    }
    
    // Injection des données de suppression d'un artiste dans son model

    function painterDelete($idPainter)
    {
        $data = new \Projet\Models\PainterModel();
        $data->deletePainter($idPainter);

    }

    


}