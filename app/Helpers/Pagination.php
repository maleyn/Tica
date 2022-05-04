<?php

namespace Projet\Helpers;


class Pagination {

    public function currentPage($page)
    {
        if(isset($page) && !empty($page)){
            return $page;
        }else{
            return 1;
        }

    }

    public function paginate($parPage, $currentPage)
    {
        
        
        return ($currentPage * $parPage) - $parPage;
        

    }

    public function nbPagesTotal($nbTotal, $parPage)
    {

        return ceil($nbTotal / $parPage);

    }

}
