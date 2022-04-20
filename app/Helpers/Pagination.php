<?php

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

class Pagination {

 
    public function Paginate($nbTotal, $parPage, $currentPage)
    {
        $pagesFront = ceil($nbTotal / $parPage);
        $premier = ($currentPage * $parPage) - $parPage;
    }

}

// On détermine le nombre d'articles par page
$parPageGalerieFront = 8;
$parPageGalerieBack = 9;

// On calcule le nombre de pages total
$pagesFront = ceil($nbTotal / $parPageGalerieFront);
$pagesBack = ceil($nbTotal / $parPageGalerieBack);