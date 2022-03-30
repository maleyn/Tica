<?php ob_start(); ?>


<main class="container padding-top20" id="artistepage">

    <h1>Ajout/Modification d'un tableau</h1>
    <form class="grid" action='indexAdmin.php?action=painterUpdate' method="post" enctype="multipart/form-data">
        <div>
            <label for="painterid" hidden>Id du tableau : </label>
            <input type="text" name="painterid" value="<?php if(!empty($painter)) { echo $painter['painterid']; }; ?>" hidden>
        </div>
        <div class="grid padding-top20" id="photo-artiste">
            <label class="text-blue" for="painterurl">Photo de l'artiste (taille max : 2.5Mo) : </label>
            <input type="file" name="painterurl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top10">Photo actuelle : </p>
            <img class="padding-top10" height="400" src="<?php if(!empty($painter)) { echo $painter['img-url']; }; ?>" alt="<?php if(!empty($painter)) { echo $painter['paintername']; }; ?>">
            <span class="text-blue padding-top10">Emplacement : 
            <?php if(!empty($painter)) { echo $painter['img-url']; }; ?></span>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="paintername">Nom de l'artiste : </label>
            <input class="form-text margin-top10 width75" type="text" name="paintername" value="<?php if(!empty($paint)) { echo $paint['paintname']; }; ?>" required>
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
            <textarea class="form-text width75 margin-top10" name="description" rows="5" required><?php if(!empty($paint)) { echo $paint['description']; };?></textarea>
        </div>
        <div class="padding-top20 margin-bottom40">
            <input class="button_submit" type="submit" value="<?php if(!empty($paint)) { echo 'Mettre à jour'; } else { echo 'Ajouter'; }; ?>">
            <?php if(!empty($paint)) {; ?>
            <button type="button" class="button_submit btn-modal">Supprimer</button>
            <?php }; ?>
        </div>
    </form>
        
<!-- Modal -->
<form action="indexAdmin.php?action=paintDelete&id=<?= $paint['paintid'] ?>" method="post">
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