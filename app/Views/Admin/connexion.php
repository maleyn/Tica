<?php require 'app/Views/Admin/head.php'; ?>
    <title>Connexion</title>
</head>
<body class="form_back">
    <h1>Connexion</h1>
    <form action="indexAdmin.php?action=connexion" method="post">
        <div>
            <label for="mail">E-mail</label>
            <input class="input_text" type="email" placeholder="Votre e-mail" name="mail" required="required">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input class="input_text"type="password" placeholder="Votre mot de passe" name="password" required="required">
        </div>
        <div class="center padding-top10">
            <input type="submit" value="Connexion" class="button_submit">
        </div>
    </form>
</body>
</html>