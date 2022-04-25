<?php

namespace Projet\Helpers;

class Substring {


    public function paintersDescriptionSub($string, $start)

    {

        $sub = substr_replace($string, '...', $start);
        
        return $sub;

    }


    
}