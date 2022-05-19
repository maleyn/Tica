<?php

require_once 'app/Views/Front/header.php';

?>

<main id="page-solo" class="container pagepadding-top">
    <div class="breadcrumb">
        <a href="index.php?action=blog">Retour Blog</a>
    </div>
    <article id="article-solo">
        <h1><?= $article['title']?></h1>
        <img src="<?= $article['image-url']?>" alt="<?= $article['title']?>">
        <div id="contenu-solo">
            <div id="content-solo">
                <?= $article['content']?>
            </div>
            <hr>
            <div id="infos-solo">
                <p><span>Par</span> <?= $article['firstname']?> <?= $article['lastname']?></p>
                <p><span>Le</span> <?= $article['create-date']?></p>
            </div>
        </div>
    </article>
</main>

<?php

require_once 'app/Views/Front/footer.php'

?>