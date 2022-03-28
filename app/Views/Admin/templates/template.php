<!doctype html>
<html lang="fr">

<head>
    <title>Tableau de bord</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="app/Public/Admin/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"> 
   
</head>

<body> 
    <header id="header-fixed">
        <nav>
            <ul id="flex-nav-dash">
                <li>
                    <a href="indexAdmin.php?action=dashboard">Tableau de bord</a>
                </li>
                <li class="subnav">
                    <a class="subnav-btn" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Pages du site</a>
                    <div class="subnav-content">
                        <a href="indexAdmin.php?action=homeView">Accueil</a>
                        <a href="#tab3Id">Blog</a>
                        <a href="indexAdmin.php?action=galeriePage">Galerie</a>
                        <a href="#tab4Id">Artistes</a>
                    </div>
                </li>
                <li>
                    <a href="indexAdmin.php?action=mail"><span class="text-red"><?php if(isset($mailCount)){echo $mailCount[0];};?></span> Mails</a>
                </li>
                <li>
                    <a href="">Mon compte</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <?php if(isset($mainContent)){ echo $mainContent;}; ?>

</body>

</html>