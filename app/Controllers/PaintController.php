<?php 

namespace Projet\Controllers;

class PaintController
{
    /* ----------- Affichage et modification des page peintures ----------- */

    // Injection des infos basiques de toutes les peintures dans la page galeriePage

    function galerieView()
    {
        $galerie = new \Projet\Models\PaintModel();
        $mail = new \Projet\Models\ContactModel();
        $paints = $galerie->getGalerie();
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
        $mail = new \Projet\Models\ContactModel();
        $paintsupdate = $galerie->updatePaints($dataPaint);
        $paints = $galerie->getGalerie();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour / Ajout effectué";

        require 'app/Views/Admin/paintsView.php';
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
}