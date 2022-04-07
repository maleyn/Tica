<?php ob_start(); ?>

<main>



</main>

<?php $maincontent = ob_get_clean(); 
require 'templates/template.php';
?>