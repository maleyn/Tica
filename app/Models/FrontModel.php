<?php 

namespace Projet\Models;

class FrontModel extends Manager
{
    // récupération des éléments du slider de la page d'accueil dans la bdd

    public function getFrontslider()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT `img-alt`, url, `intro-text1`, `intro-text2` FROM `home-slider` WHERE id=1');
        $data->execute(array());

        return $data->fetch();

    } 

    // récupération des éléments de la présentation générale dans la bdd

    public function getIntroduction()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT title, content FROM `home-introduction`');
        $data->execute(array());

        return $data->fetch();

    }

    // récupération des éléments de la présentation de tica dans la bdd

    public function getPresent()
    {

        $bdd = $this->dbConnection();
        $data = $bdd->prepare('SELECT title, `img-alt`, url, text1, text2, text3 FROM `home-tica`');
        $data->execute(array());

        return $data->fetch();

    }
}