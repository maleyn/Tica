<?php 
session_start();

require_once __DIR__ . '/vendor/autoload.php';
try {
    $controllerFront = new \Projet\Controllers\FrontController();

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'contact')
        {
            require 'app/Views/Front/contact.php';
        }

} else {

    $controllerFront->home();
}
 
} catch (Exception $e) {

    require 'app/Views/Front/error.php';
    
}