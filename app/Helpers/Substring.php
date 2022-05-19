<?php

namespace Projet\Helpers;

class Substring {


    // limite le nombre de caractères de la chaine de caractère donnée

    public function limitText($string, $start)

    {

        $sub = substr_replace($string, '...', $start);

        return $sub;

    }



} 