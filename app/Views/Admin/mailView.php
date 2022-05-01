<?php ob_start(); ?>

<main class="container template-table">
<h1 class="center text-uppercase">Mails reçu</h1>
<table>
    <thead>
        <tr class="text-blue"> 
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th class="mobile-hidden">E-mail</th>
            <th class="mobile-hidden">Objet</th>
            <th class="mobile-hidden">Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $count = 1; ?> 
    <?php foreach($allContactMail as $contactMail) { ?>
    
        <tr>
            <td><?= $count ?></td>
            <td><?= htmlspecialchars($contactMail['nom']); ?></td>
            <td><?= htmlspecialchars($contactMail['prenom']); ?></td>
            <td class="mobile-hidden"><?= htmlspecialchars($contactMail['email']); ?></td>
            <td class="mobile-hidden"><?= htmlspecialchars($contactMail['objet']); ?></td>
            <td class="mobile-hidden"><?= htmlspecialchars($contactMail['date']); ?></td>
            <td class="icones-flex">
                <a href="indexAdmin.php?action=mailDelete&id=<?= $contactMail['id'] ?>" title="Suppression du mail" class="btn-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </a>
                <a title="Voir mail" href="indexAdmin.php?action=mailSolo&id=<?= $contactMail['id'] ?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>
            </td>
        </tr>
    <?php $count++; }; ?>
    </tbody>
</table>
<span class="nbtotal" hidden data-nbtotal="<?= $count ?>"></span>

<!-- Modal -->

<form class="modalform" action="indexAdmin.php?action=mailDelete&id=" method="post">
    <div class="modal-off modaljs">

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

<script src="app/Public/Admin/js/deleteModal.js"></script>

<?php $mainContent = ob_get_clean();
require 'templates/template.php';
?>