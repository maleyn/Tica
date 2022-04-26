<?php

namespace Projet\Helpers;

class Substring {


    // limite le nombre de caractères de la chaine de caractère donné
    
    public function paintersDescriptionSub($string, $start)

    {

        $sub = substr_replace($string, '...', $start);
        
        return $sub;

    }


    
}