<?php ob_start(); ?>

<main class="container mt-5">
<h1 class="text-center text-uppercase pt-3">Mails reçu</h1>
<table class="table table-hover table-bordered mt-4">
    <thead class="thead-dark">
        <tr>
            <th class="py-3 px-6">#</th>
            <th class="py-3 px-6">Nom</th>
            <th class="py-3 px-6">Prénom</th>
            <th class="py-3 px-6">E-mail</th>
            <th class="py-3 px-6">Objet</th>
            <th class="py-3 px-6">Date</th>
            <th class="py-3 px-6 w-25 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $count = 1; ?> 
    <?php foreach($allContactMail as $contactMail) { // TOFIX fichier js permettant de cliquer sur le mail pour voir le mail?>
        
        <tr>
            <div id="contact-ligne<?=$count?>">
                <td><?= $count; ?></td>
                <td><?= htmlspecialchars($contactMail['nom']); ?></td>
                <td><?= htmlspecialchars($contactMail['prenom']); ?></td>
                <td><?= htmlspecialchars($contactMail['email']); ?></td>
                <td><?= htmlspecialchars($contactMail['objet']); ?></td>
                <td><?= $contactMail['date']; ?></td>
            </div>
            <td class="d-flex justify-content-center">
                <div class="w-25 h-25">
                    <a title="Suppression du mail" href="indexAdmin.php?action=mailDelete&id=<?= $contactMail['id'] ?>" class="w-50 h-50 d-inline-block text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
                <div class="w-25 h-25">
                    <a title="Voir mail" href="indexAdmin.php?action=mailSolo&id=<?= $contactMail['id'] ?>" class="w-50 h-50 d-inline-block"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>
            </td>
        </tr>
    <?php $count++; }; ?>
    </tbody>
</table>

<div id="countmail" class="d-none"><?= $count ?></div>
</main>
<script type="text/javascript" src="app/Public/Admin/js/mailselect.js"></script>
<?php $mainContent = ob_get_clean();
require 'templates/template.php';
?>