<?php 

namespace Projet\Controllers;

class FrontController {

    /* ------------------- Affichage et modification de la page Front ---------------------- */
    
    public function home() {

        $data = new \Projet\Models\FrontModel();
        $articles = new \Projet\Models\BlogModel();

        $dataFront = $data->getFront();
        $blogArticles = $articles->getArticlesHome();

        for ($i=0; $i < sizeof($blogArticles); $i++) { 
            $blogArticles[$i]['create-date'] = date("d-m-Y", strtotime($blogArticles[$i]['create-date']));  

        }
        
        require 'app/Views/Front/home.php';

    }

    public function contactSubmit($contactMess) {

        $mailSubmit = new \Projet\Models\ContactModel();

        if (filter_var($contactMess['mail'], FILTER_VALIDATE_EMAIL)) {
            
            $mailSubmit->mailSubmit($contactMess);

        } else {
            echo "L'e-mail n'est pas valide";
        }

}

}
