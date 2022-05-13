<?php
require_once 'app/Views/Front/header.php';
?>

<main id="page-solo" class="container pagepadding-top">
    <article id="article-solo">
        <h1><?= $paint['paintname']?></h1>
        <img src="<?= $paint['img-url']?>" alt="<?= $paint['paintname']?>">
        <div id="contenu-solo">
            <div id="infos-solo-paint">
                <div>
                    <p><span>Style : </span><?= $paint['stylename']?></p>
                    <p><span>Câdre : </span><?= $paint['framename']?></p>
                    <p><span>Type : </span><?= $paint['typename']?></p>
                </div>
                <div>
                    <p><span>Taille : </span><?= $paint['dimensionH']?>H x <?= $paint['dimensionL'] ?>L</p>
                    <p><span>Artiste : </span><?= $paint['paintername']?></p>
                </div>
            </div>
            <hr>
            <div id="content-solo">
                <?= $paint['description']?>
            </div>
        </div>
    </article>
</main>

<?php
require_once 'app/Views/Front/footer.php'
?>