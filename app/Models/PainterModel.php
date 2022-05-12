<?php 

namespace Projet\Models;
use PDO;

class PainterModel extends Manager
{

    // supprimer un artiste grâce à son Id

    public function deletePainter($idPainter)
    {
   
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM painters WHERE id = :idpainter');
        $req->execute(array(':idpainter' => $idPainter));
   
        return $req;
   
    }

    // Modifie ou ajoute un artiste dans la bdd

    public function updatePainter($dataPainter) 
    {
        $bdd = $this->dbConnection();
        
        // si il y'a un id alors faire un update selon cette id sinon un insert
        if($dataPainter['painterid'] != null) {
            $data = $bdd->prepare('UPDATE painters SET `name` = :paintername, content = :paintercontent,
                                    `photo-url` = :painterurl
                               WHERE id =' . $dataPainter['painterid']);
        } else {                    
            $data = $bdd->prepare('INSERT INTO painters (name, `photo-url`, content)
                                    VALUE (:paintername, :painterurl, :paintercontent)');
        }

        $data->execute(array(

            'paintername' => $dataPainter['paintername'],
            'paintercontent' => $dataPainter['paintercontent'],
            'painterurl' => $dataPainter['painterurl'],
        
        ));

    }   

    // Récupérer les infos basiques des artistes 

    public function getPaintersInfos($first, $parPage)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT id, name, `photo-url` FROM painters ORDER BY id DESC LIMIT :premier, :parpage");

        $data->bindValue('premier', $first, PDO::PARAM_INT);
        $data->bindValue('parpage', $parPage, PDO::PARAM_INT);

        $data->execute();
   
        return $data->fetchAll();
           
    }
    
    // Récupérer l'id d'un peintre avec son nom 

    public function getPainterId($name)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT id FROM `painters` WHERE name = :paintername');
            
        $data->execute(array('paintername' => $name));
    
        return $data->fetch();
    }

    // Récupérer les infos basiques des artistes 

    public function getPaintersBasics() 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM painters ORDER BY name');
        
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

    // récupérer toute les infos de l'artiste

    public function getPainterFullInfos($idPainter)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT painters.id as idpainter, painters.name as namepainter, `photo-url` as photopainter,
                            content FROM painters
                            WHERE painters.id = :painter");

        $data->execute(array('painter' => $idPainter));

        return $data->fetch();

    }
    // récupérer tout les noms de style d'un artiste

    public function getPainterStyle($idPainter) 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT styles.name as namestyle, painters.id FROM styles, painterstyle, painters
                                WHERE styles.id = painterstyle.idstyle
                                AND painters.id = painterstyle.idpainter
                                AND painters.id = :painter");

        $data->execute(array('painter' => $idPainter));

        return $data->fetchAll();
    }
    // Récupérer le idstyle de tout les styles de peinture d'un artiste

    public function getPainterStyleInfos($idPainter)
    {
   
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT idstyle FROM painterstyle WHERE idpainter = :painterid ORDER BY idstyle");
   
        $data->execute(array('painterid' => $idPainter));

        return $data->fetchAll();
   
    }
   

    // Ajoute des styles pour l'artiste spécifié

    public function insertStyle($stylesId, $painterId, $stylesInfosId)
    {
        
        sort($stylesId);
        $bdd = $this->dbConnection();
    
            foreach($stylesId as $styleId)
            {
                if(in_array($styleId, $stylesInfosId))
                {
                        
                    continue;
                   
                } else {                    
                  
                    $data = $bdd->prepare('INSERT INTO painterstyle (idstyle, idpainter)
                                            VALUE (:styleid, :painterid)');

                    $data->execute(array(

                        'styleid' => $styleId,
                        'painterid' => $painterId

                    ));
                }
                
            }   
        
    }

    // Supprime des styles pour l'artiste spécifié

    public function deleteStyle($stylesId, $painterId, $stylesInfosId)
    {
        $bdd = $this->dbConnection();
        foreach($stylesInfosId as $styleInfoId)
            {
                if(in_array($styleInfoId, $stylesId))
                {
                    continue;

                } else {

                    $data = $bdd->prepare('DELETE FROM painterstyle WHERE idpainter = :painterid AND idstyle = :styleid');
                    $data->execute(array(

                        'styleid' => $styleInfoId,
                        'painterid' => $painterId

                    ));
                }
            }
    }

    // Récupère les infos des artistes pour la vue front

    public function getPaintersInfosFront($first, $parPage)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT id, name,`photo-url`, content FROM painters ORDER BY id DESC LIMIT :premier, :parpage');

        $data->bindValue('premier', $first, PDO::PARAM_INT);
        $data->bindValue('parpage', $parPage, PDO::PARAM_INT);

        $data->execute();
        
        return $data->fetchAll();
        
    }

    // Récupère le nombre total d'artistes 

    public function getPaintersTotal()

    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT COUNT(id) as nbpainters FROM painters');

        return $data->fetch();
    
    }

    // Récupère tout les styles associé à l'id de l'artiste

    public function getAllStyles()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query("SELECT GROUP_CONCAT(styles.name SEPARATOR ', ') as namestyle, painters.id FROM painters, styles, painterstyle
                            WHERE styles.id = painterstyle.idstyle AND painters.id = painterstyle.idpainter GROUP BY painters.id");

        return $data->fetchAll();
    }

    public function getPainterStylesConcat($idPainter)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT GROUP_CONCAT(styles.name SEPARATOR ', ') as namestyle, painters.id FROM painters, styles, painterstyle
                            WHERE styles.id = painterstyle.idstyle AND painters.id = painterstyle.idpainter AND painters.id = :idpainter");

        $data->execute(array('idpainter' => $idPainter));
        return $data->fetch();
    }


    // Récupère tout les types associé à l'id de l'artiste

    public function getAllTypes()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query("SELECT GROUP_CONCAT(DISTINCT types.name SEPARATOR ', ') as name, painters.id as id FROM types, painters, paints
                            WHERE types.id = paints.PaintsType AND paints.PaintsPainters = painters.id GROUP BY painters.id");

        return $data->fetchAll();

    }
    // Récupère les types de peinture associé à l'id de l'artiste

    public function getPainterTypes($idPainter)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT GROUP_CONCAT(DISTINCT types.name SEPARATOR ', ') as name, painters.id as id FROM types, painters, paints
                            WHERE types.id = paints.PaintsType AND paints.PaintsPainters = painters.id AND painters.id = :idpainter");

        $data->execute(array('idpainter' => $idPainter));
        return $data->fetch();

    }

}