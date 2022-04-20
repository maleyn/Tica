<?php ob_start(); ?>

<main class="container padding-top20 cardpage">

    <h1>Ajout/Personnalisation de la galerie</h1>
    <h2 class="text-green padding-top10 margin-bottom40 center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
    <h2 class="text-green center"><?php if(isset($confirmDelete)){ echo $confirmDelete; }; ?></h2>
    <a href="indexAdmin.php?action=paintView" class="button_submit">Ajouter tableau</a>
        <section class="padding-top20 flex-card">
        <?php $count = 1 ?>
        <?php foreach($paints as $paint) { ?>
            <article class="flex-item">
                <a class="paintlink" href="indexAdmin.php?action=paintView&id=<?= $paint['id'] ?>">
                    <p><?=$count . ' - ' . $paint['name'] ?></p>
                    <img src="<?= $paint['img-url'] ?>" alt="<?= $paint['name'] ?>">
                    <a data-id="<?=$paint['id'] ?>" href="indexAdmin.php?action=paintDelete&id=<?= $paint['id'] ?>" class="btn-modal btnsup button_submit"> Supprimer</button>
                </a>
            </article>
        <?php $count++ ; } ?>
        </section>

<!-- Modal -->

<span class="nbtotal" hidden data-nbtotal="<?= $count ?>"></span>

<form class="modalform" action="indexAdmin.php?action=paintDelete&id=" method="post">
    <div class="modal-off modaljs">

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