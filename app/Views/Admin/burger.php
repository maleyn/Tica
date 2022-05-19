<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/Public/Admin/css/style.css">
</head>
<body>
<nav id="burger-nojs">
    <ul>
        <li> 
            <a href="indexAdmin.php?action=dashboard">Tableau de bord</a>
        </li> 
        <li>
            <p>Pages du site</p>
            <div id="subnav-flex">
                <a href="indexAdmin.php?action=homeView">Accueil</a>
                <a href="indexAdmin.php?action=blogPage">Blog</a>
                <a href="indexAdmin.php?action=paintsView">Galerie</a>
                <a href="indexAdmin.php?action=paintersView">Artistes</a>
                <a href="indexAdmin.php?action=categoriesView">Catégories</a>
            </div>
        </li>
        <li>
            <a href="indexAdmin.php?action=mail">Mails</a>
        </li>
        <li>
            <a href="indexAdmin.php?action=account">Gestion de compte</a>
        </li>
        <li>
            <a href="indexAdmin.php?action=deconnect">Deconnexion</a>
        </li>
     </ul>
</nav>
</body>
</html>