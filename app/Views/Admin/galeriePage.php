<?php ob_start(); ?>


<main class="container mt-5 pt-3">

    <h1>Ajout/Personnalisation de la galerie</h1>
    <a href="indexAdmin.php?action=paintView" class="btn btn-primary mt-3 px-5">Ajouter tableau</a>
        <section class="d-flex flex-wrap mt-4">
        <?php foreach($paints as $paint) { ?>
            <div>
                <a href="indexAdmin.php?action=paintView&id=<?= $paint['id'] ?>">
                    <p><?=$paint['id'] . ' - ' . $paint['name'] ?></p>
                    <img width='300' src="<?= $paint['img-url'] ?>" alt="<?= $paint['name'] ?>">
                </a>
            </div>
        <?php } ?>
        </section>
</main>

<?php $mainContent = ob_get_clean();
require 'templates/template.php';
?>