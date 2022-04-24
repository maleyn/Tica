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

    function painterSoloView($idPainter, $error)
    
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
     
    // Récupération de l'id d'un peintre grace à son nom

    function painterId($name)
    {
        $painterId = new \Projet\Models\PainterModel();
        return $painterId->getPainterId($name);
        
    }

    // Injection dans le model d'un artiste de nouvelles données du form 

    function painterUpdate($dataPainter)
    {
        $painters = new \Projet\Models\PainterModel();
        
        $painterupdate = $painters->updatePainter($dataPainter);
        
    
    }

    // Injection dans le model des données du style d'un artiste 
    // condition pour faire soit un insert, delete ou combinaison des deux
    function painterStyleUpdate($stylesId, $painterId)
    {
        $data = new \Projet\Models\PainterModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $stylesInfos = $data->getPainterStyleInfos($painterId);
        $dataPainter = $data->getPaintersInfos();
        $stylesInfosId = [];
       
        foreach($stylesInfos as $styleInfo)
        {
            array_push($stylesInfosId, $styleInfo['idstyle']);
        }
        if(sizeof($stylesInfosId) < sizeof($stylesId))
        {
        $data->insertStyle($stylesId, $painterId, $stylesInfosId);
        
        } elseif (sizeof($stylesInfosId) > sizeof($stylesId))
        {
        $data->deleteStyle($stylesId, $painterId, $stylesInfosId);
        } else 
        {
        $data->insertStyle($stylesId, $painterId, $stylesInfosId);
        $data->deleteStyle($stylesId, $painterId, $stylesInfosId);
        }

        $confirmUpdate = "Mise à jour / Ajout effectué";

        require 'app/Views/Admin/paintersView.php';

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

    function paintersViewFront($currentPage)
    {

        $paintersData = new \Projet\Models\PainterModel();
        $pagination = new \Projet\Controllers\Pagination();

        $tempArticle = '';
        $parPage = 4;

        $nbTotal = $paintersData->getPaintersTotal();
        $first = $pagination->paginate($parPage, $currentPage);    
        $pages = $pagination->nbPagesTotal($nbTotal[0], $parPage);
        $painters = $paintersData->getPaintersInfosFront($first, $parPage);
        $styles = $paintersData->getAllStyles();
        $types = $paintersData->getAlltypes();

        // ajoute une division vide sur la dernière page si il y'a un nombre impairs d'artistes
        if($nbTotal['nbpainters']%2 == 1 && $currentPage == $pages){
            $tempArticle = 1;
        };

        require 'app/Views/Front/artistes.php';
    }

    
}