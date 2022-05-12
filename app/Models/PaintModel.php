<?php 

namespace Projet\Models;
use PDO;
use Error;

class PaintModel extends Manager
{

    // supprimer une peinture grâce à son Id

    public function deletePaint($idPaint)
    {

        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM paints WHERE id = :idpaint');
        $req->execute(array('idpaint' => $idPaint));

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

    // récupérer les infos basiques de tout les tableaux
    
    public function getGalerie($first, $parPage)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT id , name , `img-url`
                            FROM paints ORDER BY id DESC LIMIT :premier, :parpage');
        
        $data->bindValue('premier', $first, PDO::PARAM_INT);
        $data->bindValue('parpage', $parPage, PDO::PARAM_INT);

        $data->execute();
        
        return $data->fetchAll();

    } 

    // récupération de toutes les infos de toutes les peintures (jointure de plusieurs tables)

    public function getGaleriePaint($idpaint)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT paints.id as paintid, paints.name as paintname, `img-url`, dimensionH,
                            dimensionL, frames.name as framename, painters.name as paintername, description, 
                             styles.name as stylename, 
                            types.name as typename 
                            FROM paints, painters, frames, styles, types
                            WHERE PaintsFrames = frames.id AND PaintsPainters = painters.id
                            AND PaintsStyle = styles.id AND PaintsType = types.id 
                            AND paints.id = :idpaint ORDER BY paints.id DESC');

        $data->execute(array('idpaint' => $idpaint));
        return $data->fetch();

    } 

    // récupération de tout les types de câdre des peintures

    public function getFrames() 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM frames ORDER BY name');
        
        return $data->fetchAll();

    }

    // récupération de tout les styles de peinture

    public function getStyles()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM styles ORDER BY name');
        
        return $data->fetchAll();

    }

    // récupération de tout les types de peinture

    public function getTypes()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM types ORDER BY name');
        
        return $data->fetchAll();

    }
    

    // récupérer l'url de la photo du tableau

    public function getGalerieUrl($paintId)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `img-url` FROM `paints` WHERE id = :paintid');
        
        $data->execute(array('paintid' => $paintId));

        return $data->fetch();

    } 

    // récupération de toutes les infos de toutes les peintures (jointure de plusieurs tables)

    public function getGalerieFront($first, $parPage)
    {


        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT paints.id as paintid, paints.name as paintname, `img-url`, dimensionH,
                            dimensionL, frames.name as framename, painters.name as paintername, description, 
                            styles.name as stylename, types.name as typename 
                            FROM paints, painters, frames, styles, types
                            WHERE PaintsFrames = frames.id AND PaintsPainters = painters.id
                            AND PaintsStyle = styles.id AND PaintsType = types.id 
                            ORDER BY paints.id DESC LIMIT :premier, :parpage');

        $data->bindValue('premier', $first, PDO::PARAM_INT);
        $data->bindValue('parpage', $parPage, PDO::PARAM_INT);

        $data->execute();

        return $data->fetchAll();

    } 

    // Récupération du nombres de peintures total

    public function getPaintsTotal()

    {
    $bdd = $this->dbConnection();
    $data = $bdd->query('SELECT COUNT(id) as nbpaints FROM paints');

    return $data->fetch();
        
    }
    // Récupération du nombres de peintures total d'un artiste spécifié

    public function getPaintsTotalPainter($idPainter)

    {
    $bdd = $this->dbConnection();
    $data = $bdd->prepare('SELECT COUNT(paints.id) as nbpaints FROM paints, painters 
                            WHERE painters.id = paints.PaintsPainters
                            AND painters.id = :idpainter');

    $data->execute(array('idpainter' => $idPainter));
    return $data->fetch();
        
    }
    
    // Ajoute un style de peinture

    public function insertStyleBdd($style)
    {
       
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("INSERT INTO styles (`name`)
        VALUES (:style)");
        $data->execute(array(

            'style' => $style
            
        ));
    }

    // Supprime un style de la BDD

    public function deleteStyleBdd($styleId)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("DELETE FROM styles WHERE id = :styleid");
        $data->execute(array(

            'styleid' => $styleId
            
        ));
    }
    // Ajoute un type de peinture dans la BDD

    public function insertTypeBdd($type)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("INSERT INTO types (`name`)
        VALUES (:type)");
        $data->execute(array(

            'type' => $type
            
        ));

    }
    // Supprime un type de peinture dans la BDD

    public function deleteTypeBdd($typeId)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("DELETE FROM types WHERE id = :typeid");
        $data->execute(array(

            'typeid' => $typeId
            
        ));
    }

     // Ajoute un type de peinture dans la BDD

    public function insertFrameBdd($frame)
    {
         $bdd = $this->dbConnection();
         $data = $bdd->prepare("INSERT INTO frames (`name`)
         VALUES (:frame)");
         $data->execute(array(
 
             'frame' => $frame
             
         ));
 
    }

     // Supprime un type de peinture dans la BDD
 
    public function deleteFrameBdd($frameId)
    {
            $bdd = $this->dbConnection();
            $data = $bdd->prepare("DELETE FROM frames WHERE id = :frameid");
            $data->execute(array(
 
             'frameid' => $frameId
         ));
         
    }

    public function getGaleriePainter($idPainter)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT paints.id as paintid, paints.name as paintname, `img-url`, dimensionH,
                            dimensionL, frames.name as framename, painters.name as paintername, description, 
                            styles.name as stylename, types.name as typename 
                            FROM paints, painters, frames, styles, types
                            WHERE PaintsFrames = frames.id AND PaintsPainters = painters.id
                            AND PaintsStyle = styles.id AND PaintsType = types.id 
                            AND painters.id = :idpainter
                            ORDER BY paints.id DESC');

        
        $data->bindValue('idpainter', $idPainter, PDO::PARAM_INT);

        $data->execute();
        return $data->fetchAll();

    } 
    
}