<?php 

namespace Projet\Models;
use PDO;

class BlogModel extends Manager
{
    // Récuperer les infos basiques de tout les articles

    public function getArticleBasic($first, $parPage)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT id , title , `image-url`
                            FROM articles ORDER BY id DESC LIMIT :premier, :parpage');

        $data->bindValue('premier', $first, PDO::PARAM_INT);
        $data->bindValue('parpage', $parPage, PDO::PARAM_INT);
        
        $data->execute();
        
        return $data->fetchAll();

    } 

    // Modifie ou ajoute un artiste dans la bdd

    public function updateArticle($dataArticle)

    {
    
    $bdd = $this->dbConnection();
    // si il y'a un id alors faire un update selon cette id sinon un insert

    if($dataArticle['articleid'] != null) {
        $data = $bdd->prepare('UPDATE articles SET title = :title, content = :content, `image-url` = :imageurl,
                               `mod-date` = :date, ArticlesUsers = :auteur
                               WHERE id =' . $dataArticle['articleid']);
    } else {
        $data = $bdd->prepare('INSERT INTO articles (title, content, `image-url`, `create-date`, ArticlesUsers)
                                    VALUE (:title, :content, :imageurl, :date, :auteur)');
    }
   
    $data->execute(array(

        'title' => $dataArticle['articletitle'],
        'content' => $dataArticle['articlecontent'],
        'imageurl' => $dataArticle['articleurl'],
        'date' => date("Y-m-d H:i:s"),
        'auteur' => $dataArticle['articleauteur']

    ));

    }   

    // récupérer l'url de la photo de l'article

    public function getArticleUrl($articleId)

    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `image-url` FROM articles WHERE id = :articleid');
        
        $data->execute(array('articleid' => $articleId));

        return $data->fetch();

    }

    // supprimer l'article de la bdd

    public function deleteArticle($idArticle)
    {

        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM articles WHERE id = :idarticle');
        $req->execute(array(':idarticle' => $idArticle));

        return $req;

    }

    // récupération de toutes les infos d'un article en fonction de son id

    public function getArticleFull($idArticle) 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT articles.id as idarticle, title, content, `image-url`, `create-date`,
                               users.firstname, users.lastname, ArticlesUsers 
                               FROM articles, users
                               WHERE users.id = articles.ArticlesUsers
                               AND articles.id = :article");

        $data->execute(array('article' => $idArticle));

        return $data->fetch();
    }

    // récupération d'infos basique de l'auteur de l'article

    public function getUserArticle()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id, firstname, lastname FROM users');
        
        return $data->fetchAll();
    } 

    // Récupération du nombres de peintures total

    public function getArticlesTotal()

    {
    $bdd = $this->dbConnection();
    $data = $bdd->query('SELECT COUNT(id) as nbarticles FROM articles');

    return $data->fetch();
    
    }

    public function getArticlesFront($first, $parPage) 
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT articles.id , title , `image-url`, content, `create-date`, 
                                users.firstname as firstname, users.lastname as lastname
                                FROM articles, users WHERE articles.ArticlesUsers = users.id 
                                ORDER BY id DESC LIMIT :premier, :parpage');

        $data->bindValue('premier', $first, PDO::PARAM_INT);
        $data->bindValue('parpage', $parPage, PDO::PARAM_INT);
        
        $data->execute();
        
        return $data->fetchAll();

    }

}