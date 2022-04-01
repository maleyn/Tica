<?php 

namespace Projet\Models;

class FrontModel extends Manager
{
    // récupération des éléments de la page front home

    public function getFront()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `slider-alt`, `slider-url`, `slider-text1`, `slider-text2`, `intro-title`, `intro-content`, 
                                        `present-alt`, `present-url`, `present-title`, `present-text1`, `present-text2`, `present-text3`
                                            FROM `homepage`');
        $data->execute(array());

        return $data->fetch();

    } 

    public function updateFront($dataFront)
    {
        
        $bdd = $this->dbConnection();
        $data = $bdd->prepare('UPDATE `homepage` SET `slider-alt` = :sliderAlt, `slider-url` = :sliderUrl, `slider-text1` = :sliderText1, 
                                        `slider-text2` = :sliderText2, `intro-title` = :introTitle, `intro-content` = :introContent, 
                                        `present-alt` = :presentAlt, `present-url` = :presentUrl, `present-title` = :presentTitle, 
                                        `present-text1` = :presentText1, `present-text2` = :presentText2, `present-text3` = :presentText3
                                        WHERE id=1');

        $data->execute(array(
            'sliderAlt' => $dataFront['sliderAlt'],
            'sliderUrl' => $dataFront['sliderUrl'],
            'sliderText1' => $dataFront['sliderText1'],
            'sliderText2' => $dataFront['sliderText2'],
            'introTitle' => $dataFront['introTitle'],
            'introContent' => $dataFront['introContent'],
            'presentAlt' => $dataFront['presentAlt'],
            'presentUrl' => $dataFront['presentUrl'],
            'presentTitle' => $dataFront['presentTitle'],
            'presentText1' => $dataFront['presentText1'],
            'presentText2' => $dataFront['presentText2'],
            'presentText3' => $dataFront['presentText3']
        ));

        return $data->fetch();

    } 

    public function getFrontUrl()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT `slider-url`, `present-url` FROM `homepage`');
        
        return $data->fetch();

    } 
    

    public function getGaleriePaint($idpaint)
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT paints.id as paintid, paints.name as paintname, `img-url`, dimensionH,
                            dimensionL, frames.name as framename, painters.name as paintername, description, 
                            painters.smallContent, painters.fullContent, styles.name as stylename, 
                            types.name as typename 
                            FROM paints, painters, frames, styles, types
                            WHERE PaintsFrames = frames.id AND PaintsPainters = painters.id
                            AND PaintsStyle = styles.id AND PaintsType = types.id 
                            AND paints.id = :idpaint ORDER BY paints.id DESC');

        $data->execute(array('idpaint' => $idpaint));

        return $data->fetch();

    } 

    public function getPaintersBasics() 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM painters ORDER BY name');
        
        return $data->fetchAll();

    }
    
    public function getFrames() 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM frames ORDER BY name');
        
        return $data->fetchAll();

    }

    public function getStyles() 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM styles ORDER BY name');
        
        return $data->fetchAll();

    }
    public function getTypes() 
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT id , name FROM types ORDER BY name');
        
        return $data->fetchAll();

    }

    
    public function getPainterFullInfos($idPainter)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT painters.id as idpainter, painters.name as namepainter, `photo-url` as photopainter,
                            smallcontent, fullcontent FROM painters
                            WHERE painters.id = :painter ORDER BY painters.id DESC");

        $data->execute(array('painter' => $idPainter));

        return $data->fetch();

    }
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
    
    

}