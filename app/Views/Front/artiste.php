<?php

require_once 'app/Views/Front/header.php';

?>

<main id="page-solo" class="container pagepadding-top">
    <article id="article-solo">
        <h1><?= $painter['namepainter']?></h1>
        <img src="<?= $painter['photopainter']?>" alt="<?= $painter['namepainter']?>">
        <div id="contenu-solo">
            <div id="infos-solo">
                <p><span>Style : </span><?= $painterStyle['namestyle']?></p>
                <p><span>Type : </span><?= $painterType['name']?></p>
            </div>
            <hr>
            <div id="content-solo">
                <?= $painter['content']?>
            </div>
        </div>
        <a class="button_dark_gold" href="index.php?action=peintureArtiste&id=<?= $painter['idpainter'] ?>">Voir toutes ses peintures</a>
    </article>
</main>

<?php

require_once 'app/Views/Front/footer.php'

?>