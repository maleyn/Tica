<?php

require 'app/Views/Front/header.php'

?>

    <section id="background_home" class="container">
        <div id="background_galerie">
            <img id="background_img" src="app/Public/Front/img/image_fond_header.png" alt="tableau de ?">
            <div id="frame_header">
                <img id="frame_corner_lt" src="app/Public/Front/img/Frame_corner_LT.svg" alt="cadre coin haut gauche">
                <img id="frame_corner_lb" src="app/Public/Front/img/Frame_corner_LB.svg" alt="cadre coin bas gauche">
                <img id="frame_corner_rb" src="app/Public/Front/img/Frame_corner_RB.svg" alt="cadre coin bas droite">
                <img id="frame_corner_rt" src="app/Public/Front/img/Frame_corner_RT.svg" alt="cadre coin haut droite">
            </div>
            <div id="intro_home">
                <div>
                    <p>TICA vous propose ses meilleures oeuvres</p>
                    <p>ainsi que celles de plusieurs autres artistes</p>
                </div>
                <div id="button_galerie">
                <a id="button_galerie_home" class="button_light" href="#">Galerie</a>
                </div>
            </div>
        </div>
        <div id="present_home">
            <h1>Présentation</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum debitis distinctio, quidem hic dolores atque dolorum fugit quaerat quasi, dolore magni facilis et aliquam reprehenderit, quae laboriosam aperiam officia libero?</p>
        </div>
        <hr>
    </section>
    <section id="tica_present" class="container">
        <h1>TICA</h1>
        <div id="flex_tica_frames">
            <div id="frame_tica_black">
            </div>
            <div id="tica_frames">
                <article id="first_frame_tica" class="tica_frame">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </article>
                <article id="second_frame_tica" class="tica_frame">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                </article>
                <article id="third_frame_tica" class="tica_frame">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece</p>
                </article>
            </div>
        </div>
        <figure>
            <img src="app/Public/Front/img/Photo_de_tica.png" alt="Photo de tica">
        </figure>
        <div id="button_artistes">
            <a href="#" class="button_dark">artistes</a>
        </div>
        <hr>
    </section>
    <section id="insta_blog">
        <div id="insta_blog_flex">
            <div id="block_instagram" class="block_bottom">
                <div id="instagram_cards">
                    <a href="#"><img src="app/Public/Front/img/grand_tableau_colore.jpg" alt="Grand tableau colorée"></a>
                    <a href="#"><img src="app/Public/Front/img/palette_de_peintre.jpg" alt="palette de peintre"></a>
                    <a href="#"><img src="app/Public/Front/img/peinture_acryliques.jpg" alt="Tube de peinture acryliques"></a>
                    <a href="#"><img src="app/Public/Front/img/tableau_africa.jpg" alt="tableau africa"></a>
                    <a href="#"><img src="app/Public/Front/img/tableau_arbre_rose.jpg" alt="tableau d'arbre rose"></a>
                    <a href="#"><img src="app/Public/Front/img/tableau_couple_embrassage.jpg" alt="tableau de couple embrassage"></a>
                </div>
                <a href="#" class="button_dark_gold button_blog_insta">instagram</a>
                <div class="frames_bottom">
                    <img id="frame_corner_lt" src="app/Public/Front/img/Framebottom_corner_LT.svg" alt="cadre coin haut gauche">
                    <img id="frame_corner_lb" src="app/Public/Front/img/Framebottom_corner_LB.svg" alt="cadre coin bas gauche">
                </div>
            </div>
            <div id="block_blog" class="block_bottom">
                <div id="block_blog_flex">
                    <article class="card_blog">
                        <a href="#">
                            <img src="app/Public/Front/img/peindre-un-portrait_sd.jpg" alt="peindre un portrait">
                            <p>Par John Doe le 13 Novembre 2021</p>
                            <h2>Comment peindre des visages</h2>
                        </a>
                    </article>
                    <article class="card_blog">
                        <a href="#">
                            <img src="app/Public/Front/img/tournesol_sd.jpg" alt="peinture tournesol">
                            <p>Par John Doe le 5 Novembre 2021</p>
                            <h2>Technique de peinture nature</h2>
                        </a>
                    </article>
                    <article class="card_blog">
                        <a href="#">
                            <img src="app/Public/Front/img/palette_peintre_sd.jpg" alt="palette de peintre">
                            <p>Par John Doe le 10 Octobre 2021</p> 
                            <h2>Bien choisir son matériel</h2>
                        </a>
                    </article>
                    <article class="card_blog">
                        <a href="#">
                            <img src="app/Public/Front/img/marin_sd.jpg" alt="peinture de marin sur une chaise">
                            <p>Par John Doe le 25 Septembre 2021</p>
                            <h2>La technique de Tica</h2>
                        </a>
                    </article>
                </div>
                <a href="#" class="button_dark_gold button_blog_insta">blog</a>
                <div class="frames_bottom">
                    <img id="frame_corner_rb" src="app/Public/Front/img/Framebottom_corner_RB.svg" alt="cadre coin bas droite">
                    <img id="frame_corner_rt" src="app/Public/Front/img/Framebottom_corner_RT.svg" alt="cadre coin haut droite">
                </div>
                
            </div>
        </div>
    </section>

<?php

require 'app/Views/Front/footer.php'

?>

