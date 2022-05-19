<?php

require 'app/Views/Front/header.php';

?>

<section id="contact-form" class="pagepadding-top container-med">
    <form id="contact" action="index.php?action=submit-contact" method="post">
        <h1>Nous Contacter</h1>
        <?php
        if(isset($confirmMess)){
        echo "<h2 class='text-center'>$confirmMess</h2>";
        }
        ?>
        <div>
            <label for="lastname">Votre Nom</label>
            <input type="text" name="lastname" placeholder="Dupont" required autofocus>
        </div>
        <div>
            <label for="firstname">Votre Prénom</label>
            <input type="text" name="firstname" placeholder="jean" required autofocus>
        </div>
        <div>
            <label for="mail">Votre E-mail</label>
            <input type="email" name="mail" placeholder="jean.dupont@gmail.com" required autofocus>
        </div>
        <div>
            <label for="objet">Objet</label>
            <input type="text" name="objet" placeholder="Vous rejoindre" required autofocus>
        </div>
        <div>
            <label for="message" id="label-textarea">Votre Message</label>
            <textarea name="message" placeholder="Votre message ici !" required autofocus></textarea >
        </div>
        <div>
            <input id="bouton_form_contact" type="submit" value="Envoyer" class="button_dark_gold">
        </div>
    </form>
    
</section>

<?php

require 'app/Views/Front/footer.php'

?>