<?php

require_once 'app/Views/Front/header.php';

?>

<main id="page-solo" class="container pagepadding-top">
    <article id="article-solo">
        <h1><?= $article['title']?></h1>
        <img src="<?= $article['image-url']?>" alt="<?= $article['title']?>">
        <div id="contenu-solo">
            <div id="content-solo">
                <p><?= $article['content']?></p>
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