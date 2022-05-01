<?php

namespace Projet\Helpers;

class DateFormat {


    public function FormatStandard($date)

    {

        $dateMod = date("d-m-Y", strtotime($date));
        
        return $dateMod;

    }

}