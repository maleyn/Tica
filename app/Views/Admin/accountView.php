<?php ob_start(); ?>

<main class="container padding-top20 soloModPage">
    <section>
        <h1>Gestion de compte</h1>
        <?php if(isset($confirmUpdate)) { ?>
        <h2 class="text-green"><?= $confirmUpdate ?></h2>
        <?php } ?>
        <form class="grid" action="indexAdmin.php?action=update-self" method="post">
            <div class="grid padding-top20">
                <label class="text-blue" for="lastname">Nom</label>
                <input class="form-text margin-top10 width50" type="text" placeholder="Nom de l'utilisateur"
                    name="lastname" value="<?= $lastname ?>" required>
            </div>
            <div class="grid padding-top20">
                <label class="text-blue" for="firstname">Prénom</label>
                <input class="form-text margin-top10 width50" type="text" placeholder="Prénom de l'utilisateur"
                    name="firstname" value="<?= $firstname ?>" required>
            </div>
            <div class="grid padding-top20">
                <p class="text-blue">Rôle</p>
                <p class="margin-top10 width50"><?= $roleUser['role'] ?></p>
            </div>

            <div class="padding-top20">
                <input type="submit" value="Mettre à jour" class="button_submit">
                <a class="button_submit inline-block center" href="indexAdmin.php?action=change-mdp">Réinitialiser mot de passe</a>
            </div>
        </form>
    </section>
    <?php if($roleUser['role'] == 'administrateur') { ?>
    <section class="padding-top20 margin-bottom40">
        <h1>Gestion des utilisateurs</h1>
        <a class="button_submit inline-block center" href="indexAdmin.php?action=user-creation">Création de compte</a>
        <h2 class="padding-top30">Utilisateurs d'administration</h2>
        <div class="template-table padding-top20">
            <table>
                <thead>
                    <tr class="text-blue">
                        <th>#</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    <?php foreach($allUsers as $user) { ?>

                    <tr>
                        <td class="idelement" hidden><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= $count ?></td>
                        <td><?= htmlspecialchars($user['firstname']); ?></td>
                        <td><?= htmlspecialchars($user['lastname']); ?></td>
                        <td><?= htmlspecialchars($user['mail']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td class="icones-flex">
                            <a title="Suppression de l'utilisateur" class="btn-modal btnid<?= $count ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                            <a title="modifier utilisateur"
                                href="indexAdmin.php?action=view-user&id=<?= $user['id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php $count++; }; ?>
                </tbody>
            </table>
        </div>
        <span class="nbtotal" hidden data-nbtotal="<?= $count ?>"></span>

        <!-- Modal -->

        <form class="modalform" action="indexAdmin.php?action=userDelete&id=" method="post">
            <div class="modal-off modaljs">

                <div class="modal-content">
                    <div class="modal-header">
                        <span class="button-close1">&times;</span>
                        <p class="modal-title">Suppression de l'utilisateur</p>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">Etes vous sûr de vouloir supprimer cet utilisateur ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button_submit">Supprimer</button>
                        <button type="button" class="button_submit button-close2">Annuler</button>
                    </div>
                </div>

            </div>
        </form>

    </section>
    <script src="app/Public/Admin/js/deleteModal.js"></script>
    <?php } ?>

</main>

<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>