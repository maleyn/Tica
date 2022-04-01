
<?php ob_start(); ?>


<main class="container padding-top20 soloModPage">

    <h1>Ajout/Modification d'un Artiste</h1>
    <form class="grid" action='indexAdmin.php?action=painterUpdate' method="post" enctype="multipart/form-data">
        <div>
            <label for="painterid" hidden>Id dz l'artiste : </label>
            <input type="text" name="painterid" value="<?php if(!empty($dataPainter)) { echo $dataPainter['idpainter']; }; ?>" hidden>
        </div>
        <div class="grid padding-top20" id="photo-artiste">
            <label class="text-blue" for="painterurl">Photo de l'artiste (taille max : 2.5Mo) : </label>
            <input type="file" name="painterurl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top10">Photo actuelle : </p>
            <img class="padding-top10" height="400" src="<?php if(!empty($dataPainter)) { echo $dataPainter['photopainter']; }; ?>" alt="<?php if(!empty($dataPainter)) { echo $dataPainter['namepainter']; }; ?>">
            <span class="text-blue padding-top10">Emplacement : 
            <?php if(!empty($dataPainter)) { echo $dataPainter['photopainter']; }; ?></span>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="paintername">Nom de l'artiste : </label>
            <input class="form-text margin-top10 width50" type="text" name="paintername" value="<?php if(!empty($dataPainter)) { echo $dataPainter['namepainter']; }; ?>" required>
        </div>
        <div class="grid-2 padding-top20">
            <div class="grid">
                <legend class="text-blue">Styles de peintures de l'artiste :</legend>
                <div class="padding-top10">
                
                <?php foreach($styles as $style) { ?>
                <label class="padding5" for="<?= $style['name'] ?>"><?= $style['name'] ?></label>
                <input class="padding-top10" type="checkbox" name="<?= $style['name'] ?>" value="<?= $style['name'] ?>"
                <?php if(!empty($dataPainter)){
                        foreach($paintersStyle as $painterStyle)
                        {
                            if($style['name'] == $painterStyle['namestyle']) {
                                echo 'checked';
                            };
                        }
                
                }  
                ?>>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="shortres">résumé court de l'artiste (~100 caractères) : </label>
            <textarea class="form-text width75 margin-top10" name="shortres" rows="3" required><?php if(!empty($dataPainter)) { echo $dataPainter['smallcontent']; };?></textarea>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="longres">résumé de l'artiste (pas de limite de caractères) : </label>
            <textarea class="form-text width75 margin-top10" name="longres" rows="6" required><?php if(!empty($dataPainter)) { echo $dataPainter['fullcontent']; };?></textarea>
        </div>
        <div class="padding-top20 margin-bottom40">
            <input class="button_submit" type="submit" value="<?php if(!empty($dataPainter)) { echo 'Mettre à jour'; } else { echo 'Ajouter'; }; ?>">
            <?php if(!empty($dataPainter)) {; ?>
            <button type="button" class="button_submit btn-modal">Supprimer</button>
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