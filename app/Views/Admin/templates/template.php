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
        <nav id="menu-principal">
            <ul id="flex-nav-dash">
                <li id="session_li">
                    <p id="session_name">Bonjour <span class="text-green"><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></span></p>
                </li>
                <li>
                    <a href="indexAdmin.php?action=dashboard">Tableau de bord</a>
                </li>
                <li class="subnav">
                    <a class="subnav-btn" href="#" role="button">Pages du site</a>
                    <div class="subnav-content">
                        <a href="indexAdmin.php?action=homeView">Accueil</a>
                        <a href="indexAdmin.php?action=blogPage">Blog</a>
                        <a href="indexAdmin.php?action=galeriePage">Galerie</a>
                        <a href="indexAdmin.php?action=paintersView">Artistes</a>
                    </div>
                </li>
                <li>
                    <a href="indexAdmin.php?action=mail"><span class="text-red"><?php if(isset($mailCount)){echo $mailCount[0];};?></span> Mails</a>
                </li>
                <li>
                    <a href="indexAdmin.php?action=account">Gestion de compte</a>
                </li>
                <li>
                    <a href="indexAdmin.php?action=deconnect">Deconnexion</a>
                </li>
            </ul>
        </nav>
        <nav id="menu_burger" class="hidden_burger hidden-show">
            <ul id="flex-nav-burger">
                <li> 
                    <a href="indexAdmin.php?action=dashboard">Tableau de bord</a>
                </li> 
                <li class="subnav">
                    <a class="subnav-btn" href="#" role="button">< Pages du site</a>
                    <div class="subnav-content">
                        <a href="indexAdmin.php?action=homeView">Accueil</a>
                        <a href="indexAdmin.php?action=blogPage">Blog</a>
                        <a href="indexAdmin.php?action=galeriePage">Galerie</a>
                        <a href="indexAdmin.php?action=paintersView">Artistes</a>
                    </div>
                </li>
                <li>
                    <a href="indexAdmin.php?action=mail"><span class="text-red"><?php if(isset($mailCount)){echo $mailCount[0];};?></span> Mails</a>
                </li>
                <li>
                    <a href="indexAdmin.php?action=account">Gestion de compte</a>
                </li>
                <li>
                    <a href="indexAdmin.php?action=deconnect">Deconnexion</a>
                </li>
            </ul>
        </nav>
        <div id="burger_boutons">
            <svg id="bouton_burger_open" class="burger_btn" viewBox="0 0 100 100" width="35" height="35"
                xmlns="http://www.w3.org/2000/svg">
                <rect fill="currentColor" width="100" height="15" rx="8"></rect>
                <rect fill="currentColor" y="30" width="100" height="15" rx="8"></rect>
                <rect fill="currentColor" y="60" width="100" height="15" rx="8"></rect>
            </svg>
            <svg id="bouton_burger_close" class="hidden_burger burger_btn" viewBox="0 0 800 600" width="35"
                height="35" xmlns="http://www.w3.org/2000/svg">
                <line stroke-width="100" y2="589.00002" x2="786.99999" y1="11.99998" x1="12.00002"
                stroke="currentColor" />
                <line y2="605" x2="-12" y1="603" x1="-12" stroke="currentColor" />
                <path stroke-width="100" d="m14.86618,589.76842l767.26768,-578.53689"
                transform="rotate(0.357475, 398.5, 300.5)" stroke="currentColor" fill="currentColor" />
            </svg>
        </div>
    </header>

    <!-- Content -->
    <?php if(isset($mainContent)){ echo $mainContent;}; ?>

</body>


<script src="app/Public/Admin/js/burgerMenu.js"></script>
</html>