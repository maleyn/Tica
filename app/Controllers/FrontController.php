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

    public function contactSubmit($contactMess) {

        $mailSubmit = new \Projet\Models\ContactModel();

        if (filter_var($contactMess['mail'], FILTER_VALIDATE_EMAIL)) {
            
            $mailSubmit->mailSubmit($contactMess);

        } else {
            echo "L'e-mail n'est pas valide";
        }

}

}
