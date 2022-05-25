<?php ob_start(); ?>


<main class="container padding-top20 soloModPage">
<script src="node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="app/Public/Admin/js/tinyMCE.js"></script>

    <h1>Ajout/Modification d'un tableau</h1>
    <p>
        <?php 
            if(isset($error))
            if(!str_contains($error, 'app')) {
            echo $error;
            }
        ?>
    </p>
    <form class="grid" action='indexAdmin.php?action=paintUpdate' method="post" enctype="multipart/form-data">
        <div>
            <label for="paintid" hidden>Id du tableau : </label>
            <input type="text" name="paintid" value="<?php if(!empty($paint)) { echo $paint['paintid']; }; ?>" hidden>
        </div>
        <div class="grid padding-top20 photo-solomod">
            <label class="text-blue" for="painturl">Image du tableau (taille max : 2.5Mo) : </label>
            <input type="file" name="painturl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top10">Image actuelle : </p>
            <img class="padding-top10" height="400" src="<?php if(!empty($paint)) { echo $paint['img-url']; }; ?>" alt="<?php if(!empty($paint)) { echo $paint['paintname']; }; ?>">
            <span class="text-blue padding-top10">Emplacement : 
            <?php if(!empty($paint)) { echo $paint['img-url']; }; ?></span>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="paintname">Nom du tableau : </label>
            <input class="form-text margin-top10 width75" type="text" name="paintname" value="<?php if(!empty($paint)) { echo $paint['paintname']; }; ?>" required>
        </div>
        <div class="grid-2 padding-top20">
            <div>
                <label class="text-blue" for="paintheight">Dimension du tableau en hauteur (cm) : </label>
                <input class="form-text margin-top10 width50" type="text" name="paintheight" value="<?php if(!empty($paint)) { echo $paint['dimensionH']; }; ?>" required>
            </div>
            <div>
                <label class="text-blue" for="paintwidth">Dimension du tableau en longueur (cm) : </label>
                <input class="form-text margin-top10 width50" type="text" name="paintwidth" value="<?php if(!empty($paint)) { echo $paint['dimensionL']; }; ?>" required>
            </div>
        </div>
        <div class="grid-2 padding-top20">
            <div class="grid">
                <label class="text-blue" for="painter">Choisissez un peintre dans la liste : </label>
                <select class="form-text width50 margin-top10" name="painter" required>
                    <option value="">Choisissez un peintre</option>
                        <?php foreach($painters as $painter) { ?>
                            <option value="<?=$painter['name']?>"><?=$painter['name']?></option>
                        <?php } ?>
                        <option value="<?php if(!empty($paint)) { echo $paint['paintername']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['paintername']; };?></option>
                </select>
            </div>
            <div class="grid">
                <label class="text-blue" for="type">Choisissez un type dans la liste : </label>
                <select class="form-text width50 margin-top10" name="type" required>
                    <option value="">Choisissez un type</option>
                        <?php foreach($types as $type) { ?>
                            <option value="<?=$type['name']?>"><?=$type['name']?></option>
                        <?php } ?>
                        <option value="<?php if(!empty($paint)) { echo $paint['typename']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['typename']; };?></option>
                </select>
            </div>
            <div class="grid padding-top10">
                <label class="text-blue" for="style">Choisissez un style dans la liste : </label>
                <select class="form-text width50 margin-top10" name="style" required>
                    <option value="">Choisissez un style</option>
                        <?php foreach($styles as $style) { ?>
                            <option value="<?=$style['name']?>"><?=$style['name']?></option>
                        <?php } ?>
                        <option value="<?php if(!empty($paint)) { echo $paint['stylename']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['stylename']; };?></option>
                </select>
            </div>
            <div class="grid padding-top10">
                <label class="text-blue" for="frame">Choisissez un cadre dans la liste : </label>
                <select class="form-text width50 margin-top10" name="frame" required>
                    <option value="">Choisissez un cadre</option>
                        <?php foreach($frames as $frame) { ?>
                            <option value="<?=$frame['name']?>"><?=$frame['name']?></option>
                        <?php } ?>
                        <option value="<?php if(!empty($paint)) { echo $paint['framename']; };?>" <?php if(!empty($paint)) { echo 'selected'; };?> hidden><?php if(!empty($paint)) { echo $paint['framename']; };?></option>
                </select>
            </div>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="description">Description du tableau : </label>
            <textarea id="mytextarealight" name="description" required><?php if(!empty($paint)) { echo $paint['description']; };?></textarea>
        </div>
        <div id="button_div" class="padding-top20 margin-bottom40">
            <input class="button_submit" type="submit" value="<?php if(!empty($paint)) { echo 'Mettre à jour'; } else { echo 'Ajouter'; }; ?>">
            <?php if(!empty($paint)) {; ?>
            <a data-id="<?=$paint['paintid'] ?>" href="indexAdmin.php?action=paintDelete&id=<?=$paint['paintid'] ?>" class="btn-modal btnsup button_submit">Supprimer</a>
            <?php }; ?>
        </div>
    </form>
        
<!-- Modal -->
<form action="indexAdmin.php?action=paintDelete&id=<?php if(isset($paint['paintid'])) { echo $paint['paintid']; }; ?>" method="post">
<div class="modal-off modaljs">

        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression du tableau</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer ce tableau ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button_submit">Supprimer</button>
                <button type="button" class="button_submit button-close2">Annuler</button>
            </div>
        </div>
   
</div>
</form>
</main>
<script src="app/Public/Admin/js/deleteSoloModal.js"></script>
<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>