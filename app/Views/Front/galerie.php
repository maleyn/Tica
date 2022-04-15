<?php

require 'app/Views/Front/header.php';

?>

<main class="container pagepadding-top">
    <h1 class="uppercase text-center">galerie</h1>
    <section class="flex-template">
        <div class="frame_template_top">
            <img class="frame_template_corner_lt" src="app/Public/Front/img/Frame_corner_LT.svg" alt="cadre coin haut gauche">
            <img class="frame_template_corner_rt" src="app/Public/Front/img/Frame_corner_RT.svg" alt="cadre coin haut droite">
        </div>
    <?php foreach($paints as $paint) { ?>
        <article class="card-template">
            <a href="">
            <img src="<?= $paint['img-url'] ?>" alt="<?= $paint['paintname'] ?>">
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
                <p><?= $paint['description'] ?></p>
            </div>
            </a>
        </article>

    <?php } ?> 
        <div class="frame_template_bottom">
            <img class="frame_template_corner_lb" src="app/Public/Front/img/Frame_corner_LB.svg" alt="cadre coin bas gauche">
            <img class="frame_template_corner_rb" src="app/Public/Front/img/Frame_corner_RB.svg" alt="cadre coin bas droite">
        </div>
    </section>
</main>


<?php

require 'app/Views/Front/footer.php'

?>