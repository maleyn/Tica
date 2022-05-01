<?php ob_start(); ?>



    <h1>Ajout/Personnalisation des articles du blog</h1>
    <h2 class="text-green padding-top10 margin-bottom40 center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
    <h2 class="text-green center"><?php if(isset($confirmDelete)){ echo $confirmDelete; }; ?></h2>
    <a href="indexAdmin.php?action=articleView" class="button_submit">Ajouter article</a>
        <section class="padding-top20 flex-card">
        <?php $count = 1 ?>
        <?php foreach($dataArticle as $article) { ?>
            <article class="flex-item">
                <a class="paintlink" href="indexAdmin.php?action=articleView&id=<?= $article['id'] ?>">
                    <p><?=$count . ' - ' . $article['title'] ?></p>
                    <img src="<?= $article['image-url'] ?>" alt="<?= $article['title'] ?>">
                    <a data-id="<?=$article['id'] ?>" href="indexAdmin.php?action=articleDelete&id=<?=$article['id'] ?>" class="btn-modal btnsup button_submit">Supprimer</button>
                    </a>
            </article>
        <?php $count++ ; } ?>
        </section>

        <!-- PAGINATION -->
        <nav>
            <ul class="pagination padding-top30 margin-bottom40">
                <li class="page-item">
                <?php if($currentPage == 1) { ?>
                    <a class="page-item-dis">Précédente</a>
                <?php } else { ?>
                    <a href="indexAdmin.php?action=blogPage&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    <?php } ?>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active_pag" : "" ?> numberPage">
                    <a href="indexAdmin.php?action=blogPage&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
                <?php endfor ?>
                <li class="page-item">
                <?php if($currentPage == $pages) { ?>
                    <a class="page-item-dis">Suivante</a>
                    <?php } else { ?>
                    <a href="indexAdmin.php?action=blogPage&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    <?php } ?>
                </li>
            </ul>
        </nav>

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