<?php 
session_start();



require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $controllerFront = new \Projet\Controllers\FrontController();

    if(isset($_GET['action'])) {

        if($_GET['action'] == 'contact')
        {
            require 'app/Views/Front/contact.php';

        } elseif($_GET['action'] == 'submit-contact')
        {
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $mail = htmlspecialchars($_POST['mail']);
            $objet = htmlspecialchars($_POST['objet']);
            $message = htmlspecialchars($_POST['message']);

            if (!empty($lastname) && (!empty($firstname) && (!empty($mail) && (!empty($objet) && (!empty($message)))))) {

                $contactMess = [
                    
                    "nom" => $lastname,
                    "prenom" => $firstname,
                    "mail" => $mail,
                    "objet" => $objet,
                    "message" => $message
                ];

                $controllerFront->contactSubmit($contactMess);
                $confirmMess = "Votre message à bien été envoyé !";
                require 'app/Views/Front/contact.php';

            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
            
        } elseif($_GET['action'] == 'galerie')
        {
            require 'app/Views/Front/galerie.php';

        }

} else {

    $controllerFront->home();
}
 
} catch (Exception $e) {

    require 'app/Views/Front/error.php';
    
}