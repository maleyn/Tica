<?php 

namespace Projet\Models;

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
            $data = $bdd->prepare('UPDATE painters SET `name` = :paintername, smallcontent = :paintersmall, fullcontent = :painterfull,
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

    // Récupérer les infos basiques des artistes 

    public function getPaintersInfos()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query("SELECT id, name, `photo-url` FROM painters");
   
        return $data->fetchAll();
           
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
                            smallcontent, fullcontent FROM painters
                            WHERE painters.id = :painter ORDER BY painters.id DESC");

        $data->execute(array('painter' => $idPainter));

        return $data->fetch();

    }
    // récupérer tout les noms de style d'un artiste

    public function getPainterStyle($idPainter) 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT styles.name as namestyle FROM styles, painterstyle, painters
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

}