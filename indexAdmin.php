<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $adminController = new \Projet\Controllers\AdminController();
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
            echo "<div class='mt-5'></div>";
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
            $adminController->galerieView();

        // Affichage de paintPage gérant un tableau de la galerie

        } elseif ($_GET[$action] == 'paintView')

        {
            if(!empty($_GET['id'])) {

                $idpaint = $_GET['id'];

            } else {
                $idpaint = null;
            }
            
            $adminController->paintView($idpaint);

        // Mise à jour ou ajout d'un tableau 
        
        } elseif ($_GET[$action] == 'paintUpdate')

        {
            echo "<div class='mt-5'></div>";
            $uploadController = new \Projet\Controllers\UploadController();
    
            $paintName = htmlspecialchars($_POST['paintname']);
            $paintDimH = htmlspecialchars($_POST['paintheight']);
            $paintDimL = htmlspecialchars($_POST['paintwidth']);
            $paintPainter = htmlspecialchars($_POST['painter']);
            $paintType = htmlspecialchars($_POST['type']);
            $paintStyle = htmlspecialchars($_POST['style']);
            $paintFrame = htmlspecialchars($_POST['frame']);
            $paintDescription = htmlspecialchars($_POST['description']);

            if(!empty($_FILES['painturl']['name']))
            {
            $paintUrl = $uploadController->uploadimg('painturl');
            } else {
            $dataUrl = $adminController->galerieViewUrl();
            $paintUrl = $dataUrl['img-url'];
            }
            
        // tableau regroupant les variables

            $dataPaint = [

                'painturl' => $paintUrl,
                'paintname' => $paintName,
                'paintheight' => $paintDimH,
                'paintWidth' => $paintDimL,
                'paintpainter' => $paintPainter,
                'painttype' => $paintType,
                'paintstyle' => $paintStyle,
                'paintframe' => $paintFrame,
                'paintdescription' => $paintDescription

            ];

            $adminController->paintUpdate($dataPaint);

        }

    } else {

        $adminController->connexionPage();

    }



} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());// faire page erreur !!!!

}