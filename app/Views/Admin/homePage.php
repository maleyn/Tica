<?php ob_start(); ?>

<main id="homepage-admin" class="container padding-top20">
<script src="node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="app/Public/Admin/js/tinyMCE.js"></script>
    <h1>Personnalisation de la page Accueil</h1>
    <h2 class="center text-green"><?php if(isset($confirmUpdate)) { echo $confirmUpdate; } ?></h2>
    <form action="indexAdmin.php?action=homeUpdate" method="post" enctype="multipart/form-data">
        <h2 class="text-gray">Première partie</h2>
        <div class="padding-top30">
            <label class="text-blue" for="sliderUrl">Image de fond accueil (taille max : 2.5Mo) : </label>
            <input id="sliderUrl" type="file" name="sliderUrl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top10 width100">Image actuelle : </p>
            <img class="padding-top10" width="200" src="<?= $frontView['slider-url']; ?>" alt="<?= $frontView['slider-alt']; ?>">
            <span class="text-blue">Emplacement : 
            <?= $frontView['slider-url']; ?></span>
        </div>
        <div class="padding-top20 grid">
            <label class="text-blue" for="sliderAlt">Description de l'image : </label>
            <input id="sliderAlt" class="form-text width75 margin-top10" type="text" name="sliderAlt" value="<?= $frontView['slider-alt']; ?>">
        </div>
        <div class="padding-top20 grid">
            <label class="text-blue" for="sliderText1">Première ligne de texte image de fond : </label>
            <input id="sliderText1" class="form-text width75 margin-top10" type="text" name="sliderText1" value="<?= $frontView['slider-text1']; ?>">
        </div>
        <div class="padding-top20 grid">
            <label class="text-blue" for="sliderText2">Deuxième ligne de texte image de fond : </label>
            <input id="sliderText2" class="form-text width75 margin-top10" type="text" name="sliderText2" value="<?= $frontView['slider-text2']; ?>">
        </div>
        <h2 class="padding-top30 text-gray">Deuxième partie</h2>
        <div class="padding-top20 grid">
            <label class="text-blue" for="introTitle">Titre Introduction : </label>
            <input id="introTitle" class="form-text width75 margin-top10" type="text" name="introTitle" value="<?= $frontView['intro-title']; ?>">
        </div>
        <div class="padding-top20 grid">
            <label class="text-blue vertic-align-top" for="introContent">Texte Introduction : </label>
            <textarea id="introContent" class="mytextarealight" name="introContent"><?= $frontView['intro-content']; ?></textarea>
        </div>
        <h2 class="text-gray padding-top20">Troisième partie</h2>
        <div class="padding-top20 grid">
            <label class="text-blue" for="presentTitle">Titre présentation : </label>
            <input id="presentTitle" class="form-text width75 margin-top10" type="text" name="presentTitle" value="<?= $frontView['present-title']; ?>">
        </div>
        <div class="padding-top20">
            <label class="text-blue" for="presentUrl">Image de présentation (taille max : 2.5Mo) : </label>
            <input id="presentUrl" type="file" name="presentUrl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top20">Image actuelle : </p>
            <img class="padding-top20" width="200" src="<?= $frontView['present-url']; ?>" alt="<?= $frontView['present-alt']; ?>">
            <span class="text-blue">Emplacement : 
            <?= $frontView['present-url']; ?></span>
        </div>
        <div class="padding-top20 grid">
            <label class="text-blue" for="presentAlt">Description de l'image : </label>
            <input id="presentAlt" class="form-text width75 margin-top10" type="text" name="presentAlt" value="<?= $frontView['present-alt']; ?>">
        </div>
        <div class="padding-top20 grid">
            <label class="text-blue vertic-align-top" for="presentText1">paragraphe de présentation : </label>
            <textarea id="presentText1" class="mytextarealight" name="presentText1"><?= $frontView['present-text']; ?></textarea>
        </div>
        <div class="padding-top30 margin-bottom40">
            <input class="button_submit" type="submit" value="Mettre à jour">
        </div>
    </form>
</main>
<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>