<?php ob_start(); ?>

<main class="form_back">
  
    <h1>Création d'utilisateur</h1>

    <form action="indexAdmin.php?action=create-user" method="post">
        <div>
            <label for="lastname">Nom</label>
            <input class="input_text" type="text" placeholder="Nom de l'utilisateur" name="lastname" required>
        </div>
        <div>
            <label for="firstname">Prénom</label>
            <input class="input_text" type="text" placeholder="Prénom de l'utilisateur" name="firstname" required>
        </div>
        <div>
            <label for="email">E-mail</label>
            <input class="input_text" type="text" placeholder="E-mail de l'utilisateur" name="mail" required>
        </div>
        <div>
            <label for="role">Rôle</label>
            <select class="input_text" name="role" required>
                <option value="">Choisissez un rôle</option>
                    <?php foreach($roles as $role) { ?>
                        <option value="<?=$role['role']?>"><?=$role['role']?></option>
                    <?php } ?>
            </select>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input class="input_text" type="password" placeholder="Mot de passe" name="password" required>
        </div>
        
        <div class="center padding-top20">
            <input type="submit" value="Créer" class="button_submit">
        </div>
        
    </form>

</main>

<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>