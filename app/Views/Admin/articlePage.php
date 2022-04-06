<?php ob_start(); ?>


<main class="container padding-top20 soloModPage">

    <h1>Ajout/Modification d'un article</h1>
    <form class="grid" action='indexAdmin.php?action=articleUpdate' method="post" enctype="multipart/form-data">
        <div>
            <label for="articleid" hidden>Id de l'article : </label>
            <input type="text" name="articleid" value="<?php if(!empty($dataArticle)) { echo $dataArticle['idarticle']; }; ?>" hidden>
        </div>
        <div class="grid padding-top20 photo-solomod">
            <label class="text-blue" for="articleurl">Photo de l'article (taille max : 2.5Mo) : </label>
            <input type="file" name="articleurl" accept=".jpeg, .jpg, .png">
            <p class="text-blue padding-top10">Photo actuelle : </p>
            <img class="padding-top10" height="400" src="<?php if(!empty($dataArticle)) { echo $dataArticle['image-url']; }; ?>" alt="<?php if(!empty($dataArticle)) { echo $dataArticle['title']; }; ?>">
            <span class="text-blue padding-top10">Emplacement : 
            <?php if(!empty($dataArticle)) { echo $dataArticle['image-url']; }; ?></span>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="title">Titre de l'article : </label>
            <input class="form-text margin-top10 width50" type="text" name="title" value="<?php if(!empty($dataArticle)) { echo $dataArticle['title']; }; ?>" required>
        </div>
        <div class="grid padding-top20">
            <label class="text-blue" for="content">Contenu de l'article : </label>
            <textarea class="form-text width75 margin-top10" name="content" rows="3" required><?php if(!empty($dataArticle)) { echo $dataArticle['content']; };?></textarea>
        </div>
        <div class="grid">
                <label class="text-blue" for="type">Choisissez l'auteur : </label>
                <select class="form-text width50 margin-top10" name="auteur" required>
                    <option value="">Choisissez l'auteur</option>
                        <?php foreach($users as $user) { ?>
                            
                            <option value="<?= $user['id'] ?>"><?=$user['firstname'] . ' ' . $user['lastname']?></option>
                        <?php } ?>
                        <option value="<?php if(!empty($dataArticle)) { echo $dataArticle['ArticlesUsers']; } ?>" <?php if(!empty($dataArticle)) { echo 'selected'; };?> hidden><?php if(!empty($dataArticle)) { echo $dataArticle['firstname'] . ' ' . $dataArticle['lastname']; };?></option>
                </select>
            </div>
        <div class="padding-top20 margin-bottom40">
            <input class="button_submit" type="submit" value="<?php if(!empty($dataArticle)) { echo 'Mettre à jour'; } else { echo 'Ajouter'; }; ?>">
            <?php if(!empty($dataArticle)) {; ?>
            <button type="button" class="button_submit btn-modal">Supprimer</button>
            <?php }; ?>
        </div>
    </form>
        
<!-- Modal -->
<form action="indexAdmin.php?action=articleDelete&id=<?= $dataArticle['idarticle'] ?>" method="post">
<div class="modal-off modaljs">

        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression de l'article</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer cet article de la base de données ?</p>
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