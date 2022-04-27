<?php

require_once 'app/Views/Front/header.php';

?>

<main id="page-artiste" class="container pagepadding-top">
    <article id="article-artiste">
        <h1><?= $painter['namepainter']?></h1>
        <img src="<?= $painter['photopainter']?>" alt="<?= $painter['namepainter']?>">
        <div id="artiste-contenu">
            <div id="artiste-infos">
                <p>Style : <?= $painterStyle['namestyle']?></p>
                <p>Type : <?= $painterType['name']?></p>
            </div>
            <div id="artiste-content">
                <p><?= $painter['content']?></p>
            </div>
        </div>
    </article>
</main>

<?php

require_once 'app/Views/Front/footer.php'

?>