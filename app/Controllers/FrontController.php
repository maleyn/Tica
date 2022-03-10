<?php 

namespace Projet\Controllers;

class FrontController {

    /* ------------------- envoi des divers éléments vers la page home ---------------------- */
    
    public function home() {

        $data = new \Projet\Models\FrontModel();
        $dataSlider = $data->getFrontslider();
        $dataIntro = $data->getIntroduction();
        $dataPresent = $data->getPresent();

        require 'app/Views/Front/home.php';

    }

    public function contactSubmit($lastname, $firstname, $mail, $objet, $message) {

        $mailSubmit = new \Projet\Models\ContactModel();

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            
            $mailSubmit->mailSubmit($lastname, $firstname, $mail, $objet, $message);

        } else {
            echo "L'e-mail n'est pas valide";
        }

}

}
