<?php 

namespace Projet\Controllers;

class BlogController
{
 
    /* ----------- Affichage et modification des pages Blog ----------- */

    // Injection des infos basiques de toutes les articles dans la page blogPage

    function blogView()
    
    {
        $data = new \Projet\Models\BlogModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $dataArticle = $data->getArticleBasic();

        require 'app/Views/Admin/blogPage.php';
    }

    // Injection des infos de l'article spécifié dans la page articlePage

    function articleView($idArticle)

    {
        $data = new \Projet\Models\BlogModel();
        $mail = new \Projet\Models\ContactModel();
        $mailCount = $mail->getMailsCount();
        $users = $data->getUserArticle();
        $dataArticle = $data->getArticleFull($idArticle);

        require 'app/Views/Admin/articlePage.php';
    }

    // Injection dans le model d'un article de nouvelles données du form 

    function articleUpdate($dataArticle)
    {
        $article = new \Projet\Models\BlogModel();
        $mail = new \Projet\Models\ContactModel();
        $articleUpdate = $article->updateArticle($dataArticle);
        
        $dataArticle = $article->getArticleBasic();
        $mailCount = $mail->getMailsCount();

        $confirmUpdate = "Mise à jour / Ajout effectué";

        require 'app/Views/Admin/blogPage.php';
    }

    // Récupération de l'url de l'image actuelle d'un article

    function articleViewUrl($articleId)
    {
        $articleUrl = new \Projet\Models\BlogModel();
        $articleDataUrl = $articleUrl->getArticleUrl($articleId);
      
        return $articleDataUrl;
    }

    // Injection des données de suppression d'un article dans son model

    function articleDelete($idArticle)
    {
        $data = new \Projet\Models\BlogModel();
        $data->deleteArticle($idArticle);

    }

}