<?php 

namespace Projet\Controllers;

class BlogController
{
 
    /* ----------- Affichage et modification des pages Blog ----------- */

    // Injection des infos basiques de toutes les articles dans la page blogPage

    public function blogView($currentPage, $confirmUpdate)
    
    {
        $data = new \Projet\Models\BlogModel();
        $mail = new \Projet\Models\ContactModel();
        $pagination = new \Projet\Helpers\Pagination();

        $parPage = 9;

        $nbTotal = $data->getArticlesTotal();
        $first = $pagination->paginate($parPage, $currentPage);    
        $pages = $pagination->nbPagesTotal($nbTotal[0], $parPage);

        $mailCount = $mail->getMailsCount();
        $dataArticle = $data->getArticleBasic($first, $parPage);

        require 'app/Views/Admin/articlesView.php';
    }

    // Injection des infos de l'article spécifié dans la page articlePage

    public function articleView($idArticle, $error)

    {
        $data = new \Projet\Models\BlogModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $users = $data->getUserArticle();
        $dataArticle = $data->getArticleFull($idArticle);

        require 'app/Views/Admin/articlePage.php';
    }

    // Injection dans le model d'un article de nouvelles données du form 

    public function articleUpdate($dataArticle)
    {
        $article = new \Projet\Models\BlogModel();
        $articleUpdate = $article->updateArticle($dataArticle);

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

        $confirmUpdate = "Mise à jour / Ajout effectué";
        $this->blogView($currentPage, $confirmUpdate);

    }

    // Récupération de l'url de l'image actuelle d'un article

    public function articleViewUrl($articleId)
    {
        $articleUrl = new \Projet\Models\BlogModel();
        $articleDataUrl = $articleUrl->getArticleUrl($articleId);
      
        return $articleDataUrl;
    }

    // Injection des données de suppression d'un article dans son model

    public function articleDelete($idArticle)
    {
        $data = new \Projet\Models\BlogModel();
        $data->deleteArticle($idArticle);

    }

    // affichage des articles vue front

    public function articlesViewFront($currentPage)
    {
        $data = new \Projet\Models\BlogModel();
        $pagination = new \Projet\Helpers\Pagination();
        $sub = new \Projet\Helpers\Substring();
        $date = new \Projet\Helpers\DateFormat();

        $tempArticle = '';
        $parPage = 8;

        $nbTotal = $data->getArticlesTotal();
        $first = $pagination->paginate($parPage, $currentPage);    
        $pages = $pagination->nbPagesTotal($nbTotal[0], $parPage);
        $articles = $data->getArticlesFront($first, $parPage);

        // limite les caractères à 270 pour le contenu

        for ($i=0; $i < sizeof($articles); $i++) { 
            if(strlen($articles[$i]['content']) > 270) {
                $temp = $sub->paintersDescriptionSub($articles[$i]['content'], 270);
                $articles[$i]['content'] = $temp;
            }

            // changement de format de la date
            $articles[$i]['create-date'] = $date->FormatStandard($articles[$i]['create-date']);  

        }
        // ajoute un article vide sur la dernière page si il y'a un nombre impairs d'article
        if($nbTotal['nbarticles']%2 == 1 && $currentPage == $pages){
            $tempArticle = 1;
        };

        require 'app/Views/Front/blog.php';

    }

    public function articlePageFront($idArticle)
    {
        $data = new \Projet\Models\BlogModel();
        $date = new \Projet\Helpers\DateFormat();
        $article = $data->getArticleFull($idArticle);

        $article['create-date'] = $date->FormatStandard($article['create-date']);
        require 'app/Views/Front/article.php';
    }

    

}