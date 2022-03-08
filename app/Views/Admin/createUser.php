<?php require 'app/Views/Admin/head.php'; ?>

    <title>Creation d'utilisateur</title>
</head>
<body class="form_back">
    <div class="padding5">
        <a href="index.php">Retour accueil du site</a>
    </div>
    <div class="padding5">
        <a href="indexAdmin.php">page de connexion</a>
    </div>
    
    <h1>Création d'utilisateur</h1>

    <form action="indexAdmin.php?action=connexion" method="post">
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
            <input class="input_text" type="text" placeholder="Votre e-mail" name="mail" required>
        </div>
        <div>
            <label for="role">Rôle</label>
            <select class="input_text" name="Rôle">
                <option value="">Choisissez un rôle</option>
                    <?php foreach($data as $role) { ?>
                        <option value=" <?= $role['role'] ?>" required ><?= $role['role'] ?></option>
                    <?php } ?>
            </select>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input class="input_text" type="password" placeholder="Votre mot de passe" name="password" required>
        </div>
        
        <div class="center">
            <input type="submit" value="Créer" class="button_submit">
        </div>
        
    </form>

</body>
</html>