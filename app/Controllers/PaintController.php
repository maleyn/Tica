<?php 

namespace Projet\Controllers;

class PaintController
{
    /* ----------- Affichage et modification des page peintures ----------- */

    // Injection des infos basiques de toutes les peintures dans la page galeriePage

    function galerieView($currentPage, $confirmUpdate)
    {
        $data = new \Projet\Models\PaintModel();
        $pagination = new \Projet\Controllers\Pagination();
        $mail = new \Projet\Models\ContactModel();
        $parPage = 9;

        
        $nbTotal = $data->getPaintsTotal();
        $first = $pagination->paginate($parPage, $currentPage);    
        $pages = $pagination->nbPagesTotal($nbTotal[0], $parPage);
        $paints = $data->getGalerie($first, $parPage);
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/paintsView.php';
    }

    // Injection des infos de la peinture spécifié dans la page paintPage

    function paintView($idpaint, $error)
    {
        $galerie = new \Projet\Models\PaintModel();
        $paintersInfos = new \Projet\Models\PainterModel();
        $mail = new \Projet\Models\ContactModel();

        $paint = $galerie->getGaleriePaint($idpaint);
        $painters = $paintersInfos->getPaintersBasics();
        $styles = $galerie->getStyles();
        $types = $galerie->getTypes();
        $frames = $galerie->getFrames();
        $mailCount = $mail->getMailsCount();

        require 'app/Views/Admin/paintPage.php';
    }

    // Injection dans le model d'une peinture de nouvelles données du form

    function paintUpdate($dataPaint)
    {
        $galerie = new \Projet\Models\PaintModel();
        $galerie->updatePaints($dataPaint);
        
        $confirmUpdate = "Mise à jour / Ajout effectué";

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }
        $this->galerieView($currentPage, $confirmUpdate);

    }

    // Récupération de l'url de l'image actuelle d'une peinture

    function galerieViewUrl($paintId)
    {
        $galerieUrl = new \Projet\Models\PaintModel();
        $galerieDataUrl = $galerieUrl->getGalerieUrl($paintId);

        return $galerieDataUrl;
    }

    // Injection des données de suppression d'une peinture dans son model

    function paintDelete($idPaint)
    {
        $data = new \Projet\Models\PaintModel();
        $data->deletePaint($idPaint);

    }

    // affichage des peintures vue front

    function galerieViewFront($currentPage)
    {
        $galerie = new \Projet\Models\PaintModel();
        $pagination = new \Projet\Controllers\Pagination();
        $sub = new \Projet\Helpers\Substring();

        $tempArticle = '';
        $parPage = 8;

        $nbTotal = $galerie->getPaintsTotal();
        $first = $pagination->paginate($parPage, $currentPage);    
        $pages = $pagination->nbPagesTotal($nbTotal[0], $parPage);
        $paints = $galerie->getGalerieFront($first, $parPage);
        

         // limite les caractères à 250 pour le contenu

         for ($i=0; $i < sizeof($paints); $i++) { 
            if(strlen($paints[$i]['description']) > 250) {
                $temp = $sub->paintersDescriptionSub($paints[$i]['description'], 250);
                $paints[$i]['description'] = $temp;
            }
            
        }
        // ajoute un article vide sur la dernière page si il y'a un nombre impairs d'article
        if($nbTotal['nbpaints']%2 == 1 && $currentPage == $pages){
            $tempArticle = 1;
        };

        require 'app/Views/Front/galerie.php';
    }
}