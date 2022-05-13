 <?php
require_once 'app/Views/Front/header.php';
?>

<main class="container pagepadding-top">
    <h1 class="uppercase text-center">galerie<?php if (isset($painterSolo)) { echo ' de ' . $paints[0]['paintername']; } ?></h1>
    <section class="flex-template">
        <div class="frame_template_top">
            <img class="frame_template_corner_lt" src="app/Public/Front/img/Frame_corner_LT.svg" alt="cadre coin haut gauche">
            <img class="frame_template_corner_rt" src="app/Public/Front/img/Frame_corner_RT.svg" alt="cadre coin haut droite">
        </div>
    <?php foreach($paints as $paint) { ?>
        <article class="card-template">
            <a href="index.php?action=peinture&id=<?= $paint['paintid'] ?>">
            <img src="<?= $paint['img-url'] ?>" alt="<?= $paint['paintname'] ?>">
            <h2><?= $paint['paintname'] ?></h2>
            <div class="infos-paint">
                <div>
                    <p>Cadre : <?= $paint['framename'] ?></p>
                    <p>Taille : <?= $paint['dimensionH'] ?>  H x  <?= $paint['dimensionL'] ?>  L </p>
                    <p>Artiste : <?= $paint['paintername'] ?></p>
                </div>
                <div>
                    <p>Style : <?= $paint['stylename'] ?></p>
                    <p>Type : <?= $paint['typename'] ?></p>
                </div>
            </div>
           
            <div class="infos-paint-desc">
                <hr>
                <?= $paint['description'] ?>
            </div>
            </a>
        </article>

    <?php } ?> 
        <?php if($tempArticle) {?>
        <article class="card-template card-empty">
        </article>
        <?php } ?>
        <div class="frame_template_bottom">
            <img class="frame_template_corner_lb" src="app/Public/Front/img/Frame_corner_LB.svg" alt="cadre coin bas gauche">
            <img class="frame_template_corner_rb" src="app/Public/Front/img/Frame_corner_RB.svg" alt="cadre coin bas droite">
        </div>
        </section>
        <?php if(!isset($painterSolo)) { ?>
        <nav>
            <ul class="pagination">
                <li class="page-item">
                <?php if($currentPage == 1) { ?>
                    <a class="page-item-dis">Précédente</a>
                <?php } else { ?>
                    <a href="index.php?action=galerie&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    <?php } ?>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active_page" : "" ?> numberPage">
                    <a href="index.php?action=galerie&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
                <?php if($page != $pages) { ?>
                    <span>-</span>
                <?php } ?>
                <?php endfor ?>
                <?php if($pages > 1) { ?>
                <span class="lastpage">/</span>
                <li class="page-item numberPage">
                <a href="index.php?action=galerie&page=<?= $pages ?>" class="page-link"><?=$pages?></a>
                <?php } ?>
                <li class="page-item">
                <?php if($currentPage == $pages) { ?>
                    <a class="page-item-dis">Suivante</a>
                    <?php } else { ?>
                    <a href="index.php?action=galerie&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    <?php } ?>
                </li>
            </ul>
        </nav>
        <?php } ?>
</main>
<script src="app/Public/Front/js/active.js"></script> 
<?php
require_once 'app/Views/Front/footer.php'
?>