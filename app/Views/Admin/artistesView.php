<?php ob_start(); ?>

<main class="container padding-top20" id="galerie">

    <h1>Ajout/Personnalisation des artistes</h1>
    <h2 class="text-green padding-top10 margin-bottom40 center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
    <h2 class="text-green center"><?php if(isset($confirmDelete)){ echo $confirmDelete; }; ?></h2>
    <a href="indexAdmin.php?action=paintView" class="button_submit">Ajouter artistes</a>
        <section class="padding-top20" id="flex-galerie">
        <?php $count = 1 ?>
        <?php foreach($paints as $paint) { ?>
            <div class="paintitem">
                <a class="paintlink" href="indexAdmin.php?action=paintView&id=<?= $paint['id'] ?>">
                    <span class="idelement" hidden><?=$paint['id'] ?></span>
                    <p><?=$count . ' - ' . $paint['name'] ?></p>
                    <img src="<?= $paint['img-url'] ?>" alt="<?= $paint['name'] ?>">
                </a>
                <button class="btn-modal btnsup button_submit btnid<?= $count ?>">Supprimer</button>
            </div>
        <?php $count++ ; } ?>
        </section>

<!-- Modal -->
<span class="nbtotal" hidden data-nbtotal="<?= $count ?>"></span>

<form class="modalform" action="indexAdmin.php?action=paintDelete&id=" method="post">
    <div class="modal-off modaljs" id="modalid">

        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression du tableau</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer ce tableau ?</p>
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