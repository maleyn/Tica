<?php 

namespace Projet\Models;

class AdminModel extends Manager
{

    // Création d'utilisateurs dans la bdd

    public function createUser($userArray)
    {
        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mail, password, UsersRoles ) 
                               VALUE (:firstname ,:lastname ,:mail ,:password , :UsersRoles )');
        $user->execute(array(

            ":firstname" => $userArray['prenom'],
            ":lastname" => $userArray['nom'],
            ":mail" => $userArray['mail'],
            ":password" => $userArray['mdp'],
            ":UsersRoles" => $userArray['role']
        )
        );
        
        return $user;
    } 

    // récupération des infos de roles dans la bdd

    public function getRole()
    {

        $bdd = $this->dbConnection();
        $role = $bdd->query('SELECT role FROM roles');
        
        return $role;
    }

    // récupération de l'id du role utilisateur

    public function getRoleId($role)

    {
        $bdd = $this->dbConnection();
        $id = $bdd->prepare("SELECT id FROM roles WHERE role = :role");
        $id->execute(array(':role' => $role));
        
        return $id->fetch();

    }

    // récupération des infos de l'utilisateur en fonction de son mail

    public function getPass($mail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('SELECT id, firstname, lastname, mail, password, UsersRoles 
                              FROM users WHERE mail = :mail');
        $req->execute(array(':mail' => $mail));

        return $req;

    }

    public function deletePaint($idPaint)
    {

        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM paints WHERE id = :idpaint');
        $req->execute(array(':idpaint' => $idPaint));

        return $req;

    }

    public function deletePainter($idPainter)
    {

        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM painters WHERE id = :idpainter');
        $req->execute(array(':idpainter' => $idPainter));

        return $req;

    }

    // Modifie ou ajoute un tableau dans la bdd

    public function updatePaints($dataPaint)

    {
        $bdd = $this->dbConnection();
        // si il y'a un id alors faire un update selon cette id sinon un insert
        if($dataPaint['paintid'] != null) {
            $data = $bdd->prepare('UPDATE paints SET `name` = :paintname, description = :paintdescription, `img-url` = :imgurl, 
                                        dimensionH = :dimensionH, dimensionL = :dimensionL, PaintsFrames = :frameId,
                                        PaintsPainters = :painterId, PaintsStyle = :styleId, PaintsType = :typeId
                                        WHERE id =' . $dataPaint['paintid']);
        } else {
            $data = $bdd->prepare('INSERT INTO paints (name, description, `img-url`, dimensionH, dimensionL,
                                        PaintsFrames, PaintsPainters, PaintsStyle, PaintsType)
                                        VALUE (:paintname, :paintdescription, :imgurl, :dimensionH, :dimensionL,
                                        :frameId, :painterId, :styleId, :typeId)');
        }

        $data->execute(array(

            'paintname' => $dataPaint['paintname'],
            'paintdescription' => $dataPaint['paintdescription'],
            'imgurl' => $dataPaint['painturl'],
            'dimensionH' => $dataPaint['paintheight'],
            'dimensionL' => $dataPaint['paintwidth'],
            'frameId' => $dataPaint['paintframe'],
            'painterId' => $dataPaint['paintpainter'],
            'styleId' => $dataPaint['paintstyle'],
            'typeId' => $dataPaint['painttype']
            
        ));

    }   

    public function getGalerie()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name , `img-url`
                            FROM paints ORDER BY id DESC');
        
        return $data->fetchAll();

    } 

// Modifie ou ajoute un artiste dans la bdd

    public function updatePainter($dataPainter) 

    {
        $bdd = $this->dbConnection();
        // si il y'a un id alors faire un update selon cette id sinon un insert
        if($dataPainter['painterid'] != null) {
            $data = $bdd->prepare('UPDATE painters, painterstyle SET `name` = :paintername, smallcontent = :paintersmall, fullcontent = :painterfull,
                                        `photo-url` = :painterurl
                                   WHERE id =' . $dataPainter['painterid']);
        } else {                    
            $data = $bdd->prepare('INSERT INTO painters (name, `photo-url`, smallcontent, fullcontent)
                                        VALUE (:paintername, :painterurl, :paintersmall, :painterfull)');
        }

        $data->execute(array(

            'paintername' => $dataPainter['paintername'],
            'paintersmall' => $dataPainter['paintershort'],
            'painterfull' => $dataPainter['painterlong'],
            'painterurl' => $dataPainter['painterurl'],
            
        ));

    }   

    public function updateStyle($stylesId, $dataPainter)
    {
        $bdd = $this->dbConnection();
        foreach($stylesId as $style)
        {
            if($dataPainter['painterid'] != null) {
                $data = $bdd->prepare('UPDATE painters, painterstyle SET `name` = :paintername, smallcontent = :paintersmall, fullcontent = :painterfull,
                                            `photo-url` = :painterurl
                                       WHERE id =' . $dataPainter['painterid']);
            } else {                    
                $data = $bdd->prepare('INSERT INTO painters (name, `photo-url`, smallcontent, fullcontent)
                                            VALUE (:paintername, :painterurl, :paintersmall, :painterfull)');

            }

        }
    }
    public function getPaintersInfos()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query("SELECT id, name, `photo-url` FROM painters");

        return $data->fetchAll();
        
    }

    // récupérer l'url de la photo de l'artiste

    public function getPainterUrl($painterId)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `photo-url` FROM `painters` WHERE id = :painterid');
        
        $data->execute(array('painterid' => $painterId));

        return $data->fetch();

    }

    // récupérer l'url de la photo du tableau

    public function getGalerieUrl($paintId)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `img-url` FROM `paints` WHERE id = :paintid');
        
        $data->execute(array('paintid' => $paintId));

        return $data->fetch();

    } 

       // récuperer une id grace au nom et table

    public function getIdTable($table, $name)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT id FROM `" .$table. "`WHERE name = :name");
   
        $data->execute(array('name' => $name,));
   
        return $data->fetch();
    }
   
    public function getArticleBasic()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , title , `image-url`
                            FROM articles ORDER BY id DESC');
        
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
    public function getArticleUrl($articleId)

    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `image-url` FROM articles WHERE id = :articleid');
        
        $data->execute(array('articleid' => $articleId));

        return $data->fetch();

    }

    public function deleteArticle($idArticle)
    {

        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM articles WHERE id = :idarticle');
        $req->execute(array(':idarticle' => $idArticle));

        return $req;

    }
}
