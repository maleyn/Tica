<?php ob_start(); ?>

<main class="container padding-top20 soloModPage">
        <h1>Gestion de l'utilisateur</h1>
        <h2 class="text-green center"><?php if(isset($confirmUpdate)){ echo $confirmUpdate; }; ?></h2>
        <form class="grid" action="indexAdmin.php?action=update-user" method="post">
            <div>
            <label for="iduser" hidden>id</label>
                <input type="text" name="iduser" value="<?= $user['id'] ?>" hidden>
            </div>
            <div class="grid padding-top20">
                <label class="text-blue" for="lastname">Nom</label>
                <input class="form-text margin-top10 width50" type="text" placeholder="Nom de l'utilisateur"
                    name="lastname" value="<?= $user['lastname'] ?>" required>
            </div>
            <div class="grid padding-top20">
                <label class="text-blue" for="firstname">Prénom</label>
                <input class="form-text margin-top10 width50" type="text" placeholder="Prénom de l'utilisateur"
                    name="firstname" value="<?= $user['firstname'] ?>" required>
            </div>
            <div class="grid padding-top20">
                <label for="role" class="text-blue">Rôle</label>
                <select class="form-text width50 margin-top10" name="role"  required>
                <option value="">Choisissez un rôle</option>
                    <?php foreach($roles as $role) { ?>
                        <option value="<?=$role['role']?>"><?=$role['role']?></option>
                    <?php } ?>
                    <option value="<?= $user['role'];?>" selected hidden><?= $user['role'];?></option>
                </select>
            </div>

            <div class="padding-top20">
                <input type="submit" value="Mettre à jour" class="button_submit">
                <?php if($_SESSION['id'] !== $user['id']) { ?>
                <button type="button" class="button_submit btn-modal">Supprimer l'utilisateur</button>
                <?php } ?>
            </div>
        </form>

<!-- Modal -->

<form action="indexAdmin.php?action=userDelete&id=<?= $user['id'] ?>" method="post">
<div class="modal-off modaljs">
        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression de l'utilisateur</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer cet utilisateur de la base de données ?</p>
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