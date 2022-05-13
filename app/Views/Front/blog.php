<?php

require_once 'app/Views/Front/header.php';

?>
<main class="container pagepadding-top">
    <h1 class="uppercase text-center">Blog</h1>
    <section class="flex-template">
        <div class="frame_template_top">
            <img class="frame_template_corner_lt" src="app/Public/Front/img/Frame_corner_LT.svg"
                alt="cadre coin haut gauche">
            <img class="frame_template_corner_rt" src="app/Public/Front/img/Frame_corner_RT.svg"
                alt="cadre coin haut droite">
        </div>
        <?php foreach($articles as $article) { ?>
        <article class="card-blog">
            <a href="index.php?action=article&id=<?=$article['id']?>">
                <img src="<?= $article['image-url'] ?>" alt="<?= $article['title'] ?>">
                <div class="infos-blog">
                    <div class="infos-blog-desc">
                        <h2><?= $article['title'] ?></h2>
                        <hr>
                    </div>
                    <div class="blog-content">
                        <?= $article['content'] ?>
                    </div>
                    <div class="infos-auteur">
                        <hr>
                        <p><span>Par</span> <?= $article['firstname'] . ' ' . $article['lastname'] . ' Le ' . $article['create-date'];?></p>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if($tempArticle) {?>
        <article class="card-template card-empty">
        </article>
        <?php } ?>
        <div id="frames_others_bottom" class="frame_template_bottom">
            <img class="frame_template_corner_lb" src="app/Public/Front/img/Frame_corner_LB.svg"
                alt="cadre coin bas gauche">
            <img class="frame_template_corner_rb" src="app/Public/Front/img/Frame_corner_RB.svg"
                alt="cadre coin bas droite">
        </div>
    </section>
    <!-- PAGINATION -->
    <nav>
    <ul class="pagination">
                <li class="page-item">
                <?php if($currentPage == 1) { ?>
                    <a class="page-item-dis">Précédente</a>
                <?php } else { ?>
                    <a href="index.php?action=blog&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    <?php } ?>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active_page" : "" ?> numberPage">
                    <a href="index.php?action=blog&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
                <?php if($page != $pages) { ?>
                    <span>-</span>
                <?php } ?>
                <?php endfor ?>
                <?php if($pages > 1) { ?>
                <span class="lastpage">/</span>
                <li class="page-item numberPage">
                <a href="index.php?action=blog&page=<?= $pages ?>" class="page-link"><?=$pages?></a>
                <?php } ?>
                <li class="page-item">
                <?php if($currentPage == $pages) { ?>
                    <a class="page-item-dis">Suivante</a>
                    <?php } else { ?>
                    <a href="index.php?action=blog&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    <?php } ?>
                </li>
            </ul>
    </nav>
</main>

<?php

require_once 'app/Views/Front/footer.php'

?>