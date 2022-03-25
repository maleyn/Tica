<?php ob_start(); ?>


<main class="container mt-5 pt-3">

    <h1>Ajout/Modification d'un tableau</h1>
    <form action="indexAdmin.php?action=paintUpdate" method="post" class="form-group row pt-3" enctype="multipart/form-data">
        <div class="col-12 mt-2">
            <label class="text-info" for="painturl">Image du tableau (taille max : 2.5Mo) : </label>
            <input type="file" name="painturl" accept=".jpeg, .jpeg, .png">
            <p class="text-info">Image actuelle : </p>
            <img width="400" src="<?php if(!empty($paint)) { echo $paint['img-url']; }; ?>" alt="<?php if(!empty($paint)) { echo $paint['paintname']; }; ?>">
            <span class="text-info m-3">Emplacement : </span>
            <?php if(!empty($paint)) { echo $paint['img-url']; }; ?>
        </div>
        <div class="col-10 mt-2">
            <label class="text-info" for="paintname">Nom du tableau : </label>
            <input class="form-control" type="text" name="paintname" value="<?php if(!empty($paint)) { echo $paint['paintname']; }; ?>" required>
        </div>
        <div class="col-5 mt-2">
            <label class="text-info" for="paintheight">Dimension du tableau en hauteur (cm) : </label>
            <input class="form-control" type="text" name="paintheight" value="<?php if(!empty($paint)) { echo $paint['dimensionH']; }; ?>" required>
        </div>
        <div class="col-5 mt-2">
            <label class="text-info" for="paintwidth">Dimension du tableau en longueur (cm) : </label>
            <input class="form-control" type="text" name="paintwidth" value="<?php if(!empty($paint)) { echo $paint['dimensionL']; }; ?>" required>
        </div>
        <div class="col-5 mt-3">
            <label class="text-info" for="painter">Choisissez un peintre dans la liste : </label>
            <select class="input_text" name="painter" required>
                <option value="">Choisissez un peintre</option>
                    <?php foreach($painters as $painter) { ?>
                        <option value="<?=$painter['name']?>"><?=$painter['name']?></option>
                    <?php } ?>
                    <option value="<?php if(!empty($paint)) { echo $paint['paintername']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['paintername']; };?></option>
            </select>
        </div>
        <div class="col-5 mt-3">
            <label class="text-info" for="type">Choisissez un type dans la liste : </label>
            <select class="input_text" name="type" required>
                <option value="">Choisissez un type</option>
                    <?php foreach($types as $type) { ?>
                        <option value="<?=$type['name']?>"><?=$type['name']?></option>
                    <?php } ?>
                    <option value="<?php if(!empty($paint)) { echo $paint['typename']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['typename']; };?></option>
            </select>
        </div>
        <div class="col-5 mt-3">
            <label class="text-info" for="style">Choisissez un style dans la liste : </label>
            <select class="input_text" name="style" required>
                <option value="">Choisissez un style</option>
                    <?php foreach($styles as $style) { ?>
                        <option value="<?=$style['name']?>"><?=$style['name']?></option>
                    <?php } ?>
                    <option value="<?php if(!empty($paint)) { echo $paint['stylename']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['stylename']; };?></option>
            </select>
        </div>
        <div class="col-5 mt-3">
            <label class="text-info" for="frame">Choisissez un cadre dans la liste : </label>
            <select class="input_text" name="frame" required>
                <option value="">Choisissez un cadre</option>
                    <?php foreach($frames as $frame) { ?>
                        <option value="<?=$frame['name']?>"><?=$frame['name']?></option>
                    <?php } ?>
                    <option value="<?php if(!empty($paint)) { echo $paint['framename']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['framename']; };?></option>
            </select>
        </div>
        <div class="col-10 mt-2">
            <label class="text-info" for="description">Description du tableau : </label>
            <textarea class="form-control" name="description" rows="5" required><?php if(!empty($paint)) { echo $paint['description']; };?></textarea>
        </div>
        <div class="col-8 mt-2">
            <input class="px-5 py-2" type="submit" value="<?php if(!empty($paint)) { echo 'Mettre à jour'; } else { echo 'Ajouter'; }; ?>" class="button_submit">
        </div>
    </form>
</main>

<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>