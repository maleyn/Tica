<?php

use Projet\Controllers\AdminController;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    $adminController = new \Projet\Controllers\AdminController();
    $paintController = new \Projet\Controllers\PaintController();
    $painterController = new \Projet\Controllers\PainterController();
    $blogController = new \Projet\Controllers\BlogController();
    $action = 'action';

    if (isset($_GET['action'])) 
    {   
        
        // allez sur la page de création d'utilisateur

        if($_GET[$action] == 'user-creation')
        {
            $adminController->usercreation();

        // Créer un utilisateur

        } elseif ($_GET[$action] == 'create-user')

        { 
            
            $pass = $_POST['password'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $userArray = [
                    "prenom" => $_POST['firstname'], 
                    "nom" => $_POST['lastname'],
                    "mdp" => $mdp, 
                    "mail" => $_POST['mail'], 
                    "role" => $_POST['role']
                    ];

            $adminController->createuser($userArray);


        // Connexion au tableau de bord
       
        }  elseif ($_GET[$action] == 'connexion')

        {
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = $_POST['password'];
            if (!empty($mail) && !empty($mdp)) {
                $adminController->connexion($mail, $mdp);
            } else {
                throw new Exception('Infos manquante');
            }

        // Affichage des mails du tableau de bord

        } elseif ($_GET[$action] == 'mail')

        {
            $adminController->mailContact();

        } elseif ($_GET[$action] == 'dashboard')

        {

            $adminController->dashboard();
        

        } elseif ($_GET[$action] == 'mailSolo')

        {
            $idMail = $_GET['id'];
            $adminController->mailSolo($idMail);

        } elseif ($_GET[$action] == 'mailDelete')

        {
            $idMail = $_GET['id'];
            $adminController->mailDelete($idMail);

        // Affichage de la page homePage gérant la page d'accueil du site

        } elseif ($_GET[$action] == 'homeView')

        {

            $adminController->homeView();

        // Mise à jour des infos de la page d'accueil

        } elseif ($_GET[$action] == 'homeUpdate')

        {
            
            $uploadController = new \Projet\Controllers\UploadController();
            
            $sliderAlt = htmlspecialchars($_POST['sliderAlt']);
            $sliderText1 = htmlspecialchars($_POST['sliderText1']);
            $sliderText2 = htmlspecialchars($_POST['sliderText2']);
            $introTitle = htmlspecialchars($_POST['introTitle']);
            $introContent = htmlspecialchars($_POST['introContent']);
            $presentAlt = htmlspecialchars($_POST['presentAlt']);
            $presentTitle = htmlspecialchars($_POST['presentTitle']);
            $presentText1 = htmlspecialchars($_POST['presentText1']);
            $presentText2 = htmlspecialchars($_POST['presentText2']);
            $presentText3 = htmlspecialchars($_POST['presentText3']);

            if(!empty($_FILES['sliderUrl']['name']))
            {
            $sliderUrl = $uploadController->uploadimg('sliderUrl');
            } else {
            $dataUrl = $adminController->homeViewUrl();
            $sliderUrl = $dataUrl['slider-url'];
            }
            
            if(!empty($_FILES['presentUrl']['name']))
            {
            $presentUrl = $uploadController->uploadimg('presentUrl');
            } else {
            $dataUrl = $adminController->homeViewUrl();
            $presentUrl = $dataUrl['present-url'];
            }

            $dataFront = [

                'sliderAlt' => $sliderAlt,
                'sliderUrl' => $sliderUrl,
                'sliderText1' => $sliderText1,
                'sliderText2' => $sliderText2,
                'introTitle' => $introTitle,
                'introContent' => $introContent,
                'presentAlt' => $presentAlt,
                'presentUrl' => $presentUrl,
                'presentTitle' => $presentTitle,
                'presentText1' => $presentText1,
                'presentText2' => $presentText2,
                'presentText3' => $presentText3
                
            ];

            $adminController->homeUpdate($dataFront);
            
        // Affichage de la page galeriePage gérant la page galerie du site

        } elseif ($_GET[$action] == 'galeriePage')

        {
            $paintController->galerieView();

        // Affichage de paintPage gérant un tableau de la galerie

        } elseif ($_GET[$action] == 'paintView')

        {
            if(!empty($_GET['id'])) {

                $idpaint = $_GET['id'];

            } else {
                $idpaint = null;
            }
            
            $paintController->paintView($idpaint);

        // Mise à jour ou ajout d'un tableau 
        
        } elseif ($_GET[$action] == 'paintUpdate')

        {
        
            $uploadController = new \Projet\Controllers\UploadController();
           
            $paintId = htmlspecialchars($_POST['paintid']);
            $paintName = htmlspecialchars($_POST['paintname']);
            $paintDimH = htmlspecialchars($_POST['paintheight']);
            $paintDimL = htmlspecialchars($_POST['paintwidth']);
            $paintPainter = htmlspecialchars($_POST['painter']);
            $paintType = htmlspecialchars($_POST['type']);
            $paintStyle = htmlspecialchars($_POST['style']);
            $paintFrame = htmlspecialchars($_POST['frame']);
            $paintDescription = htmlspecialchars($_POST['description']);

            // récupérer l'id des différentes tables

            $painterId = $adminController->idView('painters', $paintPainter)['id'];
            $typeId = $adminController->idView('types', $paintType)['id'];
            $styleId = $adminController->idView('styles', $paintStyle)['id'];
            $frameId = $adminController->idView('frames', $paintFrame)['id'];

            if(!empty($_POST['paintid']))
            {
                $paintId = htmlspecialchars($_POST['paintid']);
            } else {
                $paintId = null;
            }
           

            if(!empty($_FILES['painturl']['name']))
            {
            var_dump($_FILES['painturl']['name']);
            $paintUrl = $uploadController->uploadimg('painturl');
            } else {
            $dataUrl = $paintController->galerieViewUrl($paintId);
            $paintUrl = $dataUrl['img-url'];
            var_dump($paintUrl);
            }
            
            // array regroupant les variables

            $dataPaint = [

                'paintid' => $paintId,
                'painturl' => $paintUrl,
                'paintname' => $paintName,
                'paintheight' => $paintDimH,
                'paintwidth' => $paintDimL,
                'paintpainter' => $painterId,
                'painttype' => $typeId,
                'paintstyle' => $styleId,
                'paintframe' => $frameId,
                'paintdescription' => $paintDescription

            ];

            $paintController->paintUpdate($dataPaint);

        } elseif ($_GET[$action] == 'paintDelete')

        {
       
            $idPaint = $_GET['id'];
            $paintController->paintDelete($idPaint);
            
            $paintController->galerieView();

        } elseif ($_GET[$action] == 'paintersView')
        
        {
            $painterController->paintersView();
 
        } elseif ($_GET[$action] == 'painterSoloView')
        
        {
            if(!empty($_GET['id'])) {

                $idPainter = $_GET['id'];

            } else {
                $idPainter = null;
            }
            $painterController->painterSoloView($idPainter);

        } elseif ($_GET[$action] == 'painterUpdate')

        {
     
            $uploadController = new \Projet\Controllers\UploadController();
        

            $painterId = htmlspecialchars($_POST['painterid']);
            $painterName = htmlspecialchars($_POST['paintername']);
            $painterShort = htmlspecialchars($_POST['shortres']);
            $painterLong = htmlspecialchars($_POST['longres']);

            $stylesId = [];
            $styles = $painterController->getStyle();
          
            foreach($styles as $style) {
                if(!empty($_POST[$style['name']]))
                {
                    array_push($stylesId, $style['id']);
                }
            }

            
            if(!empty($_POST['painterid']))
            {
                $painterId = htmlspecialchars($_POST['painterid']);
            } else {
                $painterId = null;
            }
            

            if(!empty($_FILES['painterurl']['name']))
            {
                
            $painterUrl = $uploadController->uploadimg('painterurl');
            
            } else {

            $dataUrl = $painterController->painterViewUrl($painterId);
            $painterUrl = $dataUrl['photo-url'];

            }
            
            // array regroupant les variables

            $dataPainter = [

                'painterid' => $painterId,
                'painterurl' => $painterUrl,
                'paintername' => $painterName,
                'paintershort' => $painterShort,
                'painterlong' => $painterLong
                
            ];

            $painterController->painterStyleUpdate($stylesId, $painterId);
            $painterController->painterUpdate($dataPainter);

        } elseif ($_GET[$action] == 'painterDelete')

        {
       
            $idPainter = $_GET['id'];
            $painterController->painterDelete($idPainter);
            
            $painterController->paintersView();

        } elseif ($_GET[$action] == 'blogPage')

        {
            $blogController->blogView();

        } elseif ($_GET[$action] == 'articleView')

        {
            if(!empty($_GET['id'])) {

                $idArticle = $_GET['id'];

            } else {
                $idArticle = null;
            }
            $blogController->articleView($idArticle);

        } elseif ($_GET[$action] == 'articleUpdate')

        {
     
            $uploadController = new \Projet\Controllers\UploadController();
        
            $articleId = htmlspecialchars($_POST['articleid']);
            $articleTitle = htmlspecialchars($_POST['title']);
            $articleContent = htmlspecialchars($_POST['content']);
            $articleAuteur = htmlspecialchars($_POST['auteur']);
            
            
            if(!empty($_POST['articleid']))
            {
                $painterId = htmlspecialchars($_POST['articleid']);
            } else {
                $painterId = null;
            }
           
            if(!empty($_FILES['articleurl']['name']))
            {
            $articleUrl = $uploadController->uploadimg('articleurl');
            
            } else {
            $dataUrl = $blogController->articleViewUrl($articleId);
            $articleUrl = $dataUrl['image-url'];
            }
            
            // array regroupant les variables

            $dataArticle = [

                'articleid' => $articleId,
                'articleurl' => $articleUrl,
                'articletitle' => $articleTitle,
                'articlecontent' => $articleContent,
                'articleauteur' => $articleAuteur

            ];

            $blogController->articleUpdate($dataArticle);

        } elseif ($_GET[$action] == 'articleDelete')

        {
            $idArticle = $_GET['id'];
            $blogController->articleDelete($idArticle);
            
            $blogController->blogView();
        }

    } else {

        $adminController->connexionPage();

    }



} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());// faire page erreur !!!!

}