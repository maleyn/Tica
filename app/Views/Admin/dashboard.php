<?php ob_start(); ?>

<main class="container padding-top20">
    <h1>Chiffres du site</h1>
    <section id="dashboard-flex">
        <article class="dash-card">
            <a href="indexAdmin.php?action=galeriePage">
            <p>Nombre Total de tableaux</p>
            <h2><?= $stats['nbpaints'] ?></h2>
            </a>
        </article>  
        <article class="dash-card">
            <a href="indexAdmin.php?action=paintersView">
            <p>Nombre Total d'artistes</p>
            <h2><?= $stats['nbpainters'] ?></h2>
            </a>
        </article>  
        <article class="dash-card">
            <a href="indexAdmin.php?action=blogPage">
            <p>Nombre Total d'articles</p>
            <h2><?= $stats['nbarticles'] ?></h2>
            </a>
        </article>
        <article class="dash-card">
            <a href="">
            <p>Nombre Total d'utilisateurs</p>
            <h2><?= $stats['nbusers'] ?></h2>
            </a>
        </article>  
    </section>
</main>

<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>