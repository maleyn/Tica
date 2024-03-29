
<?php ob_start(); ?>


<main class="container padding-top20 soloModPage">
<script src="node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="app/Public/Admin/js/tinyMCE.js"></script>

    <h1>Ajout/Modification d'un Artiste</h1>
    <p>
        <?php 
            if(isset($error))
            if(!str_contains($error, 'app')) {
            echo $error;
            }
        ?>
    </p>
    <form class="grid" action='indexAdmin.php?action=painterUpdate' method="post" enctype="multipart/form-data">
        <div>
            <label for="painterid" hidden>Id dz l'artiste : </label>
            <input id="painterid" type="text" name="painterid" value="<?php if(!empty($dataPainter)) { echo $dataPainter['idpainter']; }; ?>" hidden>
        </div>
        <div class="grid padding-top20 photo-solomod">
            <label class="text-blue" for="painterurl">Photo de l'artiste (taille max : 2.5Mo) : </label>
            <input id="painterurl" type="file" name="painterurl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top10">Photo actuelle : </p>
            <img class="padding-top10" height="400" src="<?php if(!empty($dataPainter)) { echo $dataPainter['photopainter']; }; ?>" alt="<?php if(!empty($dataPainter)) { echo $dataPainter['namepainter']; }; ?>">
            <span class="text-blue padding-top10">Emplacement : 
            <?php if(!empty($dataPainter)) { echo $dataPainter['photopainter']; }; ?></span>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="paintername">Nom de l'artiste : </label>
            <input id="paintername" class="form-text margin-top10 width50" type="text" name="paintername" value="<?php if(!empty($dataPainter)) { echo $dataPainter['namepainter']; }; ?>" required>
        </div>
        <div class="grid-2 padding-top20">
            <div class="grid">
                <p class="text-blue">Styles de peintures de l'artiste :</p>
                <div class="padding-top10 flex_style">
                
                <?php foreach($styles as $style) { ?>
                <div>
                <label class="padding5" for="<?= $style['name'] ?>"><?= $style['name'] ?></label>
                <input id="<?= $style['name'] ?>" class="padding-top10" type="checkbox" name="<?= $style['name'] ?>" value="<?= $style['name'] ?>"
                <?php if(!empty($dataPainter)){
                        foreach($paintersStyle as $painterStyle)
                        {
                            if($style['name'] == $painterStyle['namestyle']) {
                                echo 'checked';
                            };
                        }
                
                }  
                ?>>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="content">résumé de l'artiste : </label>
            <textarea id="content" class="mytextarealight" name="content" required><?php if(!empty($dataPainter)) { echo $dataPainter['content']; };?></textarea>
        </div>
        <div id="button_div" class="padding-top20 margin-bottom40">
            <input class="button_submit" type="submit" value="<?php if(!empty($dataPainter)) { echo 'Mettre à jour'; } else { echo 'Ajouter'; }; ?>">
            <?php if(!empty($dataPainter)) {; ?>
                <a data-id="<?=$dataPainter['idpainter'] ?>" href="indexAdmin.php?action=painterDelete&id=<?=$dataPainter['idpainter'] ?>" class="btn-modal btnsup button_submit">Supprimer</a>
            <?php }; ?>
        </div>
    </form>
        
<!-- Modal -->
<form action="indexAdmin.php?action=painterDelete&id=<?= $dataPainter['idpainter'] ?>" method="post">
<div class="modal-off modaljs">
        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression de l'artiste</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer cet artiste de la base de données ?</p>
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