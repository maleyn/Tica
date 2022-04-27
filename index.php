<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    $controllerFront = new \Projet\Controllers\FrontController();
    $controllerPaint = new \Projet\Controllers\PaintController();
    $controllerPainter = new \Projet\Controllers\PainterController();
    $controllerBlog = new \Projet\Controllers\BlogController();

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

            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int) strip_tags($_GET['page']);
            }else{
                $currentPage = 1;
            }
            
            $paints = $controllerPaint->galerieViewFront($currentPage);

        } elseif($_GET['action'] == 'artistes')
        {

            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int) strip_tags($_GET['page']);
            }else{
                $currentPage = 1;
            }
            
            $paints = $controllerPainter->paintersViewFront($currentPage);

        } elseif($_GET['action'] == 'artiste')

        {
            $idPainter = $_GET['id'];
            $controllerPainter->painterPageFront($idPainter);
        
        } elseif($_GET['action'] == 'blog')
        {

            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int) strip_tags($_GET['page']);
            }else{
                $currentPage = 1;
            }
            
            $articles = $controllerBlog->articlesViewFront($currentPage);

        }

} else {

    $controllerFront->home();
}
 
} catch (Exception $e) {

    require 'app/Views/Front/error.php';
    
}