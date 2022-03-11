<?php ob_start(); ?>

<div class="card mt-5">
    <div class="card-body">
        <?php 
            $date = date_create($mailSolo['date']);           
        ?>
        <p><span class="text-info">Mail envoyé par : </span><?= htmlspecialchars($mailSolo['prenom']) . ' ' . htmlspecialchars($mailSolo['nom']); ?></p>
        <p><span class="text-info">E-mail : </span><?= htmlspecialchars($mailSolo['email'])?></p>
        <p><span class="text-info">Reçu le : </span><?= date_format($date, 'l d/m/Y'); ?> à <?= date_format($date, 'H:i:s');?></p>
        <p><span class="text-info">Objet du message : </span><?= htmlspecialchars($mailSolo['objet'])?></p>
        <p><span class="text-info">Message : </span><?= htmlspecialchars($mailSolo['message'])?></p>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg m-2" data-toggle="modal" data-target="#modelId">
  Supprimer
</button>

<!-- Modal -->
<form action="indexAdmin.php?action=mailDelete&id=<?= $mailSolo['id'] ?>" method="post">
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppression du mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer ce mail ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Supprimer</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php $mainContent = ob_get_clean();
require 'templates/template.php';
?>