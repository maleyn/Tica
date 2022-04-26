<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/Public/Front/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Srisakdi&family=Stylish&family=Spartan&family=Raleway&display=swap"
        rel="stylesheet">

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
                            <li class="<?= (empty($_GET['action']) ? 'active_menu' : ""); ?>"><a href="index.php">Accueil</a></li>
                            <li class="<?= !empty($_GET['action']) ? (($_GET['action']) == 'blog' ? 'active_menu' : "") : ""; ?>"><a href="index.php?action=blog">Blog</a></li>
                            <li class="<?= !empty($_GET['action']) ? (($_GET['action']) == 'artistes' ? 'active_menu' : "") : ""; ?>"><a href="index.php?action=artistes">Artistes</a></li>
                            <li class="<?= !empty($_GET['action']) ? (($_GET['action']) == 'galerie' ? 'active_menu' : "") : ""; ?>"><a href="index.php?action=galerie">Galerie</a></li>
                        </ul>
                    </nav>
                    <nav id="menu_burger" class="hidden menu_active_burger">
                        <ul id="burger_ul">
                            <li class="<?= (empty($_GET['action']) ? 'active_menu' : " "); ?>"><a  href="index.php">Accueil</a></li>
                            <li class="<?= !empty($_GET['action']) ? (($_GET['action']) == 'blog' ? 'active_menu' : "") : ""; ?>"><a href="index.php?action=blog">Blog</a></li>
                            <li class="<?= !empty($_GET['action']) ? (($_GET['action']) == 'artistes' ? 'active_menu' : "") : ""; ?>"><a href="index.php?action=artistes">Artistes</a></li>
                            <li class="<?= !empty($_GET['action']) ? (($_GET['action']) == 'galerie' ? 'active_menu' : "") : ""; ?>"><a href="index.php?action=galerie">Galerie</a></li>
                        </ul>
                    </nav>
                    <div>
                        <svg id="bouton_burger_open" class="burger_btn" viewBox="0 0 100 100" width="45" height="45"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect fill="currentColor" width="100" height="15" rx="8"></rect>
                            <rect fill="currentColor" y="30" width="100" height="15" rx="8"></rect>
                            <rect fill="currentColor" y="60" width="100" height="15" rx="8"></rect>
                        </svg>
                        <svg id="bouton_burger_close" class="hidden burger_btn" viewBox="0 0 800 600" width="45"
                            height="45" xmlns="http://www.w3.org/2000/svg">
                            <line stroke-width="100" y2="589.00002" x2="786.99999" y1="11.99998" x1="12.00002"
                                stroke="currentColor" />
                            <line y2="605" x2="-12" y1="603" x1="-12" stroke="currentColor" />
                            <path stroke-width="100" d="m14.86618,589.76842l767.26768,-578.53689"
                                transform="rotate(0.357475, 398.5, 300.5)" stroke="currentColor" fill="currentColor" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>
