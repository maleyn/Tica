<?php 

namespace Projet\Controllers;

class FrontController {

    /* ------------------- Affichage et modification de la page d'accueil ---------------------- */
    
    public function home() {

        $data = new \Projet\Models\FrontModel();
        $articles = new \Projet\Models\BlogModel();

        $dataFront = $data->getFront();
        $blogArticles = $articles->getArticlesHome();

        for ($i=0; $i < sizeof($blogArticles); $i++) { 
            $blogArticles[$i]['create-date'] = date("d-m-Y", strtotime($blogArticles[$i]['create-date']));  

        }

        require_once 'app/Helpers/InstagramApi.php';
        require 'app/Views/Front/home.php';

    }

/* ------------------- Envoie du formulaire de contact ---------------------- */

    public function contactSubmit($contactMess) {

        $mailSubmit = new \Projet\Models\ContactModel();

        if (filter_var($contactMess['mail'], FILTER_VALIDATE_EMAIL)) {
            
            $mailSubmit->mailSubmit($contactMess);

        } else {
            echo "L'e-mail n'est pas valide";
        }

}/* ------------------- Affichage de la page des mentions légales ---------------------- */

    public function mentionsLegales() {

        require 'app/Views/Front/mentionslegales.php';

    }
/* ------------------- Affichage de la page rejoindre ---------------------- */

    public function rejoindre() {

        require 'app/Views/Front/rejoindre.php';
    }

}
