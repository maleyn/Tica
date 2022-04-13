<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/Public/Front/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Srisakdi&family=Stylish&family=Spartan&family=Raleway&display=swap" rel="stylesheet"> 

    <title>Tica</title>
</head>
<body>
    <header>
        <div id="headband">
            <div class="container">
                <div id="headband_items">
                    <div id="headband_logo">
                        <a href="index.php">
                            <p>TICA</p>
                            <p>Peinture</p>
                        </a>
                    </div>
                    <nav id="menu_principal">
                        <ul id="main_menu">
                            <a href="index.php"><li>Accueil</li></a>
                            <a href="#"><li>Blog</li></a>
                            <a href="#"><li>Artistes</li></a>
                            <a href="index.php?action=galerie"><li>Galerie</li></a>
                        </ul>   
                    </nav>
                    <nav id="menu_burger" class="hidden">
                        <ul id="burger_ul">
                            <a href="index.php"><li>Accueil</li></a>
                            <a href="#"><li>Blog</li></a>
                            <a href="#"><li>Artistes</li></a>
                            <a href="index.php?action=galerie"><li>Galerie</li></a>
                            <a href="#"><li>Mon compte</li></a>
                        </ul>   
                    </nav>
                    <div id="bouton_burger">
                        <svg viewBox="0 0 100 100" width="45" height="45" rx="8">
                            <rect fill="currentColor" width="100" height="15" rx="8"></rect>
                            <rect fill="currentColor" y="30" width="100" height="15" rx="8"></rect>
                            <rect fill="currentColor" y="60" width="100" height="15" rx="8"></rect>
                        </svg>
                    </div>
                    <div id="account_header">
                        <a href="#">
                        <img src="app/Public/Front/img/icon_user_account.svg" alt="icone du compte utilisateur">
                        <p>Mon compte</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<script src="app/Public/Front/js/burgerMenu.js"></script>

