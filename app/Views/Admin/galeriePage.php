<?php ob_start(); ?>


<main class="container padding-top20" id="galerie">

    <h1>Ajout/Personnalisation de la galerie</h1>
    <h2 class="text-green padding-top10 margin-bottom40 center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
    <a href="indexAdmin.php?action=paintView" class="button_submit">Ajouter tableau</a>
        <section class="padding-top20" id="flex-galerie">
        <?php foreach($paints as $paint) { ?>
            <div>
                <a href="indexAdmin.php?action=paintView&id=<?= $paint['id'] ?>">
                    <p><?=$paint['id'] . ' - ' . $paint['name'] ?></p>
                    <img src="<?= $paint['img-url'] ?>" alt="<?= $paint['name'] ?>">
                </a>
            </div>
        <?php } ?>
        </section>
</main>

<?php $mainContent = ob_get_clean();
require 'templates/template.php';
?>