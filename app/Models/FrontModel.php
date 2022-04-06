<?php 

namespace Projet\Models;

class FrontModel extends Manager
{
    // récupération des éléments de la page d'accueil

    public function getFront()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `slider-alt`, `slider-url`, `slider-text1`, `slider-text2`, `intro-title`, `intro-content`, 
                                        `present-alt`, `present-url`, `present-title`, `present-text1`, `present-text2`, `present-text3`
                                            FROM `homepage`');
        $data->execute(array());

        return $data->fetch();

    } 

    // Modifie ou ajoute des éléments de la page d'accueil dans la bdd

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

    // récupération des l'urls des images actuelle de la page d'accueil

    public function getFrontUrl()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT `slider-url`, `present-url` FROM `homepage`');
        
        return $data->fetch();

    } 

}