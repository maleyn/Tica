<?php 

namespace Projet\Controllers;

class FrontController {

    /* ------------------- Affichage et modification de la page Front ---------------------- */
    
    public function home() {

        $data = new \Projet\Models\FrontModel();
        $dataFront = $data->getFront();
        
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
