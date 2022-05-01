<?php

require_once 'app/Views/Front/header.php';

?>

<main class="container pagepadding-top">
    <h1 class="uppercase text-center">artistes</h1>
    <section class="flex-painter">
        <div class="frame_template_top">
            <img class="frame_template_corner_lt" src="app/Public/Front/img/Frame_corner_LT.svg" alt="cadre coin haut gauche">
            <img class="frame_template_corner_rt" src="app/Public/Front/img/Frame_corner_RT.svg" alt="cadre coin haut droite">
        </div>
    <?php foreach($painters as $painter) { ?>
        <article class="card-painter">
            <a href="index.php?action=artiste&id=<?= $painter['id'] ?>">
            <img src="<?= $painter['photo-url'] ?>" alt="<?= $painter['name'] ?>">
            <p class="name-painter"><?= $painter['name'] ?></p>
            <div class="infos-painter">
                <div>
                    <p><span>Style : </span><?php foreach($styles as $style) {
                        if($style['id'] == $painter['id']) { 
                        echo $style['namestyle'];
                        }
                    } ?></p>
                    <p><span>Type : </span><?php foreach($types as $type) {
                        if($type['id'] == $painter['id']) { 
                        echo $type['name'];
                        }
                    } ?></p>
                </div>
            </div>
            <div class="infos-painter-desc">
                <hr>
                <p><?= $painter['content'] ?></p>
            </div>
            </a>
        </article>

    <?php } ?> 
        <?php if($tempArticle) {?>
        <article class="card-painter card-empty-painter">
        </article>
        <?php } ?>
        <div id="frames_others_bottom" class="frame_template_bottom">
            <img class="frame_template_corner_lb" src="app/Public/Front/img/Frame_corner_LB.svg" alt="cadre coin bas gauche">
            <img class="frame_template_corner_rb" src="app/Public/Front/img/Frame_corner_RB.svg" alt="cadre coin bas droite">
        </div>
        </section>
        <nav>
            <ul class="pagination">
                <li class="page-item">
                <?php if($currentPage == 1) { ?>
                    <a class="page-item-dis">Précédente</a>
                <?php } else { ?>
                    <a href="index.php?action=artistes&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    <?php } ?>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active_pag" : "" ?> numberPage">
                    <a href="index.php?action=artistes&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
                <?php endfor ?>
                <li class="page-item">
                <?php if($currentPage == $pages) { ?>
                    <a class="page-item-dis">Suivante</a>
                    <?php } else { ?>
                    <a href="index.php?action=artistes&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    <?php } ?>
                </li>
            </ul>
        </nav>
</main>
<script src="app/Public/Front/js/active.js"></script> 
<?php

require_once 'app/Views/Front/footer.php'

?>