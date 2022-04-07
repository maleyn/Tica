<?php ob_start(); ?>

<main class="container padding-top20 cardpage">

    <h1>Ajout/Personnalisation des artistes</h1>
    <h2 class="text-green padding-top10 margin-bottom40 center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
    <h2 class="text-green center"><?php if(isset($confirmDelete)){ echo $confirmDelete; }; ?></h2>
    <a href="indexAdmin.php?action=painterSoloView" class="button_submit">Ajouter artistes</a>
        <section class="padding-top20 flex-card">
        <?php $count = 1 ?>
        <?php foreach($dataPainter as $painter) { ?>
            <article class="flex-item">
                <a class="paintlink" href="indexAdmin.php?action=painterSoloView&id=<?= $painter['id'] ?>">
                    <span class="idelement" hidden><?=$painter['id'] ?></span>
                    <p><?=$count . ' - ' . $painter['name'] ?></p>
                    <img src="<?= $painter['photo-url'] ?>" alt="<?= $painter['name'] ?>">
                </a>
                <button class="btn-modal btnsup button_submit btnid<?= $count ?>">Supprimer</button>
            </article>
        <?php $count++ ; } ?>
        </section>

<!-- Modal -->
<span class="nbtotal" hidden data-nbtotal="<?= $count ?>"></span>

<form class="modalform" action="indexAdmin.php?action=painterDelete&id=" method="post">
    <div class="modal-off modaljs">

        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression de l'artiste</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer cet artiste de la base de données ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button_submit">Supprimer</button>
                <button type="button" class="button_submit button-close2">Annuler</button>
            </div>
        </div>
   
    </div>
</form>

</main>
<script src="app/Public/Admin/js/deleteModal.js"></script>


<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>