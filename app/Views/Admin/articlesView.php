<?php ob_start(); ?>


<main class="container padding-top20 cardpage">

    <h1>Ajout/Personnalisation des articles du blog</h1>
    <h2 class="text-green padding-top10 margin-bottom40 center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
    <h2 class="text-green center"><?php if(isset($confirmDelete)){ echo $confirmDelete; }; ?></h2>
    <a href="indexAdmin.php?action=articleView" class="button_submit">Ajouter article</a>
        <section class="padding-top20 flex-card">
        <?php $count = 1 ?>
        <?php foreach($dataArticle as $article) { ?>
            <article class="flex-item">
                <a class="paintlink" href="indexAdmin.php?action=articleView&id=<?= $article['id'] ?>">
                    <span class="idelement" hidden><?=$article['id'] ?></span>
                    <p><?=$count . ' - ' . $article['title'] ?></p>
                    <img src="<?= $article['image-url'] ?>" alt="<?= $article['title'] ?>">
                </a>
                <button class="btn-modal btnsup button_submit btnid<?= $count ?>">Supprimer</button>
            </article>
        <?php $count++ ; } ?>
        </section>

<!-- Modal -->
<span class="nbtotal" hidden data-nbtotal="<?= $count ?>"></span>

<form class="modalform" action="indexAdmin.php?action=articleDelete&id=" method="post">
    <div class="modal-off modaljs">

        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression de l'article</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer cet article ?</p>
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