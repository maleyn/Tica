<?php

namespace Projet\Controllers;


class Pagination {

 
    public function paginate($parPage, $currentPage)
    {
        
        
        return ($currentPage * $parPage) - $parPage;
        

    }

    public function nbPagesTotal($nbTotal, $parPage)
    {

        return ceil($nbTotal / $parPage);

    }

}
