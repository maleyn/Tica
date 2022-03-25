<?php ob_start(); ?>

<main class="container mt-5 pt-3">
    
    <h1>Personnalisation de la page Accueil</h1>
    <p class="text-success lead bg-dark text-center"><?php if(isset($confirmUpdate)) { echo $confirmUpdate; };?></p>

    <form action="indexAdmin.php?action=homeUpdate" method="post" class="form-group col pt-3" enctype="multipart/form-data">
        <h2 class="p-3 text-secondary">Première partie</h2>
        <div class="col-12 mt-2">
            <label class="text-info" for="sliderUrl">Image de fond accueil (taille max : 2.5Mo) : </label>
            <input type="file" name="sliderUrl" accept=".jpeg, .jpg, .png">
            <p class="text-info">Image actuelle : </p>
            <img width="200" src="<?= $frontView['slider-url']; ?>" alt="<?= $frontView['slider-alt']; ?>">
            <span class="text-info m-3">Emplacement : </span>
            <?= $frontView['slider-url']; ?>
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="sliderAlt">Description de l'image : </label>
            <input class="form-control" type="text" name="sliderAlt" value="<?= $frontView['slider-alt']; ?>">
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="sliderText1">Première ligne de texte image de fond : </label>
            <input class="form-control" type="text" name="sliderText1" value="<?= $frontView['slider-text1']; ?>">
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="sliderText2">Deuxième ligne de texte image de fond : </label>
            <input class="form-control" type="text" name="sliderText2" value="<?= $frontView['slider-text2']; ?>">
        </div>
        <h2 class="p-3 text-secondary">Deuxième partie</h2>
        <div class="col-8 mt-2">
            <label class="text-info" for="introTitle">Titre Introduction : </label>
            <input class="form-control" type="text" name="introTitle" value="<?= $frontView['intro-title']; ?>">
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="introContent">Texte Introduction : </label>
            <textarea class="form-control" name="introContent" rows="5"><?= $frontView['intro-content']; ?></textarea>
        </div>
        <h2 class="p-3 text-secondary">Troisième partie</h2>
        <div class="col-8 mt-2">
            <label class="text-info" for="presentTitle">Titre présentation : </label>
            <input class="form-control" type="text" name="presentTitle" value="<?= $frontView['present-title']; ?>">
        </div>
        <div class="col-12 mt-2">
            <label class="text-info" for="presentUrl">Image de présentation (taille max : 2.5Mo) : </label>
            <input class="" type="file" name="presentUrl" accept=".jpeg, .jpg, .png">
            <p class="text-info">Image actuelle : </p>
            <img width="200" src="<?= $frontView['present-url']; ?>" alt="<?= $frontView['present-alt']; ?>">
            <span class="text-info m-3">Emplacement : </span>
            <?= $frontView['present-url']; ?>
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="presentAlt">Description de l'image : </label>
            <input class="form-control" type="text" name="presentAlt" value="<?= $frontView['present-alt']; ?>">
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="presentText1">premier paragraphe de texte : </label>
            <textarea class="form-control" name="presentText1" rows="3"><?= $frontView['present-text1']; ?></textarea>
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="presentText2">Deuxième paragraphe de texte : </label>
            <textarea class="form-control" name="presentText2" rows="3"><?= $frontView['present-text2']; ?></textarea>
        </div>
        <div class="col-8 mt-2">
            <label class="text-info" for="presentText3">Troisième paragraphe de texte : </label>
            <textarea class="form-control" name="presentText3" rows="3"><?= $frontView['present-text3']; ?></textarea>
        </div>
        <div class="col-8 mt-2">
            <input class="px-5 py-2" type="submit" value="Mettre à jour" class="button_submit">
        </div>
    </form>

</main>

<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>