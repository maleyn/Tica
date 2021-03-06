<?php

use Projet\Controllers\AdminController;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function restrictedAccess() 
{
    if(empty($_SESSION))
    {
        throw new Exception ("Vous n'avez pas l'accés", 401);
    }
}

try {

    $adminController = new \Projet\Controllers\AdminController();
    $paintController = new \Projet\Controllers\PaintController();
    $painterController = new \Projet\Controllers\PainterController();
    $blogController = new \Projet\Controllers\BlogController();
    $pageHelper = new \Projet\Helpers\Pagination();
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
            restrictedAccess();
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
            $confirmUpdate = 'Nouvel utilisateur créé';
            $adminController->accountView($_SESSION['id'], $_SESSION['firstname'], $_SESSION['lastname'], $confirmUpdate);

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

        // Mettre à jour les infos utilisateur

        } elseif ($_GET[$action] == 'update-self')

        {

            $idaccount = $_SESSION['id'];
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $confirmUpdate = $adminController->updateSelf($idaccount, $lastname, $firstname);
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $adminController->accountView($idaccount, $firstname, $lastname, $confirmUpdate);

        // mise à jour des infos de l'utilisateur d'administration

        } elseif ($_GET[$action] == 'update-user')

        {
            $idUser = htmlspecialchars($_POST['iduser']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $role = htmlspecialchars($_POST['role']);
            $confirmUpdate = $adminController->updateUser($idUser, $lastname, $firstname, $role);
            $adminController->userView($idUser, $confirmUpdate);

        // Affichage des mails du tableau de bord

        } elseif ($_GET[$action] == 'mail')

        {
            restrictedAccess();
            $adminController->mailContact();

        } elseif ($_GET[$action] == 'dashboard')

        {

            restrictedAccess();
            $adminController->dashboard();
        

        } elseif ($_GET[$action] == 'burger')

        {

            include_once "app/Views/Admin/burger.php";
            

        } elseif ($_GET[$action] == 'mailSolo')

        {
            restrictedAccess();
            $idMail = $_GET['id'];
            $adminController->mailSolo($idMail);

        } elseif ($_GET[$action] == 'mailDelete')

        {
            restrictedAccess();
            $idMail = $_GET['id'];
            $adminController->mailDelete($idMail);

        // Affichage de la page homePage gérant la page d'accueil du site

        } elseif ($_GET[$action] == 'homeView')

        {
            restrictedAccess();
            $adminController->homeView();

        // Affichage de la page de compte

        } elseif ($_GET[$action] == 'account')

        {
            restrictedAccess();
            $confirmUpdate = '';
            $adminController->accountView($_SESSION['id'], $_SESSION['firstname'], $_SESSION['lastname'], $confirmUpdate);
        
        // Suppression d'un utilisateur

        } elseif ($_GET[$action] == 'userDelete')

        {
            $confirmUpdate = 'Utilisateur supprimé';
            $idUser = $_GET['id'];
            $adminController->userDelete($idUser);
            $adminController->accountView($_SESSION['id'], $_SESSION['firstname'], $_SESSION['lastname'], $confirmUpdate);

        // Affichage de la page d'un utilisateur spécifique
            
        } elseif ($_GET[$action] == 'view-user')

            
        {
            $idUser = $_GET['id'];
            $confirmUpdate = '';
            $adminController->userView($idUser, $confirmUpdate);


        } elseif ($_GET[$action] == 'deconnect') 

        {
            session_destroy();
            header('Location: indexAdmin.php');
        
        // Mise à jour des infos de la page d'accueil

        } elseif ($_GET[$action] == 'homeUpdate')

        {
            restrictedAccess();
            $uploadController = new \Projet\Controllers\UploadController();
            
            $sliderAlt = htmlspecialchars($_POST['sliderAlt']);
            $sliderText1 = htmlspecialchars($_POST['sliderText1']);
            $sliderText2 = htmlspecialchars($_POST['sliderText2']);
            $introTitle = htmlspecialchars($_POST['introTitle']);
            $introContent = $_POST['introContent'];
            $presentAlt = htmlspecialchars($_POST['presentAlt']);
            $presentTitle = htmlspecialchars($_POST['presentTitle']);
            $presentText1 = $_POST['presentText1'];

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
                'presentText' => $presentText1
                
            ];
            
            $adminController->homeUpdate($dataFront, $presentUrl);
            
            
        // Affichage de la page galeriePage gérant la page galerie du site

        } elseif ($_GET[$action] == 'paintsView')

        {
            restrictedAccess();
            $currentPage = $pageHelper->currentPage((isset(($_GET['page'])) ? ((int) strip_tags($_GET['page'])) : null));
            $paintController->galerieView($currentPage, '');

        // Affichage de paintPage gérant un tableau de la galerie

        } elseif ($_GET[$action] == 'paintView')
            
        {
            restrictedAccess();
            $error = "";
            $idPaint = !empty($_GET['id'])? htmlspecialchars($_GET['id']):null;     
            $paintController->paintView($idPaint, $error);

        // Mise à jour ou ajout d'un tableau 
        
        } elseif ($_GET[$action] == 'paintUpdate')

        {
            restrictedAccess();
            $error = 0;

            $uploadController = new \Projet\Controllers\UploadController();

            $paintId = htmlspecialchars($_POST['paintid']) ?? null;
            $paintName = htmlspecialchars($_POST['paintname']);
            $paintDimH = htmlspecialchars($_POST['paintheight']);
            $paintDimL = htmlspecialchars($_POST['paintwidth']);
            $paintPainter = htmlspecialchars($_POST['painter']);
            $paintType = htmlspecialchars($_POST['type']);
            $paintStyle = htmlspecialchars($_POST['style']);
            $paintFrame = htmlspecialchars($_POST['frame']);
            $paintDescription = $_POST['description'];

            // récupérer l'id des différentes tables

            $painterId = $adminController->idView('painters', $paintPainter)['id'];
            $typeId = $adminController->idView('types', $paintType)['id'];
            $styleId = $adminController->idView('styles', $paintStyle)['id'];
            $frameId = $adminController->idView('frames', $paintFrame)['id'];

            if(!empty($_FILES['painturl']['name']))
            {
            $paintUrl = $uploadController->uploadimg('painturl');
                if(!str_contains($paintUrl, 'app')) {
                $error = 1;
                }
            } else {
            $dataUrl = $paintController->galerieViewUrl($paintId);
            $paintUrl = $dataUrl['img-url'];
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
            if($error == 0)
            {
            $paintController->paintUpdate($dataPaint);
            } else {
            $paintController->paintView($paintId, $paintUrl);
            }

        } elseif ($_GET[$action] == 'paintDelete')

        {
            restrictedAccess();
            $idPaint = $_GET['id'];
            $paintController->paintDelete($idPaint);
            $currentPage = $pageHelper->currentPage((isset(($_GET['page'])) ? ((int) strip_tags($_GET['page'])) : null));
            $paintController->galerieView($currentPage, '');

        } elseif ($_GET[$action] == 'paintersView')
        
        {
            restrictedAccess();
            $currentPage = $pageHelper->currentPage((isset(($_GET['page'])) ? ((int) strip_tags($_GET['page'])) : null));
            $painterController->paintersView($currentPage, '');
 
        } elseif ($_GET[$action] == 'painterSoloView')
        
        {   
            $error = "";
            $idPainter = isset($_GET['id'])? htmlspecialchars($_GET['id']):null; 
            $painterController->painterSoloView($idPainter, $error);

        } elseif ($_GET[$action] == 'painterUpdate')

        {
            restrictedAccess();
            $uploadController = new \Projet\Controllers\UploadController();
            $error = 0;
            $painterId = htmlspecialchars($_POST['painterid']) ?? null;
            $painterName = htmlspecialchars($_POST['paintername']);
            $painterContent = $_POST['content'];
            


            $stylesId = [];
            $styles = $painterController->getStyle();
          
            foreach($styles as $style) {
                if(!empty($_POST[$style['name']]))
                {
                    array_push($stylesId, $style['id']);
                }
            }

            if(!empty($_FILES['painterurl']['name']))
            {
                
            $painterUrl = $uploadController->uploadimg('painterurl');
                if(!str_contains($painterUrl, 'app')) {
                $error = 1;
                }
            } else {
            $dataUrl = $painterController->painterViewUrl($painterId);
            $painterUrl = $dataUrl['photo-url'];
            }
            
            // array regroupant les variables

            $dataPainter = [

                'painterid' => $painterId,
                'painterurl' => $painterUrl,
                'paintername' => $painterName,
                'paintercontent' => $painterContent
                
            ];

            if($error == 0)
            {
            $painterController->painterUpdate($dataPainter);
            if($painterId == null)
            {
            $painterId = $painterController->painterId($dataPainter['paintername'])[0];
            }
            $painterController->painterStyleUpdate($stylesId, $painterId);
            } else {
            $painterController->painterSoloView($painterId, $painterUrl);
            }

        } elseif ($_GET[$action] == 'painterDelete')

        {
            restrictedAccess();
            $idPainter = $_GET['id'];
            $painterController->painterDelete($idPainter);
            $currentPage = $pageHelper->currentPage((isset(($_GET['page'])) ? ((int) strip_tags($_GET['page'])) : null));
            $painterController->paintersView($currentPage, '');

        } elseif ($_GET[$action] == 'blogPage')

        {
            $currentPage = $pageHelper->currentPage((isset(($_GET['page'])) ? ((int) strip_tags($_GET['page'])) : null));
            $blogController->blogView($currentPage, '');

        } elseif ($_GET[$action] == 'articleView')

        {
            restrictedAccess();
            $error = "";
            if(!empty($_GET['id'])) {

                $idArticle = $_GET['id'];

            } else {
                $idArticle = null;
            }
            $blogController->articleView($idArticle, $error);

        } elseif ($_GET[$action] == 'articleUpdate')

        {
            restrictedAccess();
            $error = 0;
            $uploadController = new \Projet\Controllers\UploadController();

            $painterId = htmlspecialchars($_POST['articleid']) ?? null;
            $articleId = htmlspecialchars($_POST['articleid']);
            $articleTitle = htmlspecialchars($_POST['title']);
            $articleContent = $_POST['content'];
            $articleAuteur = htmlspecialchars($_POST['auteur']);
            
            
            if(!empty($_FILES['articleurl']['name']))
            {
            $articleUrl = $uploadController->uploadimg('articleurl');
                if(!str_contains($articleUrl, 'app')) {
                $error = 1;
                }
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
            if($error == 0)
            {
            $blogController->articleUpdate($dataArticle);
            } else {
            $blogController->articleView($articleId, $articleUrl);
            }

        } elseif ($_GET[$action] == 'articleDelete')

        {
            restrictedAccess();
            $idArticle = $_GET['id'];
            $blogController->articleDelete($idArticle);
            $currentPage = $pageHelper->currentPage((isset(($_GET['page'])) ? ((int) strip_tags($_GET['page'])) : null));
            $blogController->blogView($currentPage, '');

        } elseif ($_GET[$action] == 'categoriesView')
        {
            restrictedAccess();
            $confirmUpdate = '';
            $error = '';
            $adminController->getInfosCategories($confirmUpdate, $error);

        } elseif ($_GET[$action] == 'styleDelete')
        {
            restrictedAccess();
            $idStyle = $_POST['style'];
            $adminController->styleDelete($idStyle);

        } elseif ($_GET[$action] == 'styleAjout')
        {
            restrictedAccess();
            $style = $_POST['styleAdd'];
            $adminController->styleAjout($style);

        } elseif ($_GET[$action] == 'typeAjout')
        {
            restrictedAccess();
            $type = $_POST['typeAdd'];
            $adminController->typeAjout($type);

        } elseif ($_GET[$action] == 'typeDelete')
        {
            restrictedAccess();
            $idType = $_POST['type'];
            $adminController->typeDelete($idType);
            
        } elseif ($_GET[$action] == 'frameAjout')
        {
            restrictedAccess();
            $type = $_POST['frameAdd'];
            $adminController->frameAjout($type);

        } elseif ($_GET[$action] == 'frameDelete')
        {
            restrictedAccess();
            $idFrame = $_POST['frame'];
            $adminController->frameDelete($idFrame);
        } 

    } else {

        $adminController->connexionPage();

    }

} catch (Exception $e) {

    echo ('Erreur : ' . $e->getMessage());
    
} 

catch (Error $e) {

    die('Erreur : ' . $e->getMessage());

} 