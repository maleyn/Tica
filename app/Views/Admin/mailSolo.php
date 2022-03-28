<?php ob_start(); ?>

<main class="container" id="mailsolo">
<div class="padding-top20" id="mailviewsolo">
    <div>
        <?php 
            $date = date_create($mailSolo['date']);           
        ?>
        <p><span>Mail envoyé par : </span><?= htmlspecialchars($mailSolo['prenom']) . ' ' . htmlspecialchars($mailSolo['nom']); ?></p>
        <p><span>E-mail : </span><?= htmlspecialchars($mailSolo['email'])?></p>
        <p><span>Reçu le : </span><?= date_format($date, 'l d/m/Y'); ?> à <?= date_format($date, 'H:i:s');?></p>
        <p><span>Objet du message : </span><?= htmlspecialchars($mailSolo['objet'])?></p>
        <p><span>Message : </span><?= htmlspecialchars($mailSolo['message'])?></p>
    </div>
</div>
<!-- Boutton trigger modal -->
<button type="button" class="button_submit btn-modal">
  Supprimer
</button>

<!-- Modal -->
<form action="indexAdmin.php?action=mailDelete&id=<?= $mailSolo['id'] ?>" method="post">
<div class="modal-off modaljs" id="modalid">

        <div class="modal-content">
            <div class="modal-header">
                <span class="button-close1">&times;</span>
                <p class="modal-title">Suppression du mail</p>
            </div>
            <div class="modal-body">
                <p class="text-danger">Etes vous sûr de vouloir supprimer ce mail ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button_submit">Supprimer</button>
                <button type="button" class="button_submit button-close2">Annuler</button>
            </div>
        </div>
   
</div>
</form>
</main>
<script src="app/Public/Admin/js/modal.js"></script>
<?php $mainContent = ob_get_clean();
require 'templates/template.php';
?>