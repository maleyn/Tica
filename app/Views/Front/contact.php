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
            <input id="lastname" type="text" name="lastname" placeholder="Dupont" required>
        </div>
        <div>
            <label for="firstname">Votre Prénom</label>
            <input id="firstname" type="text" name="firstname" placeholder="jean" required>
        </div>
        <div>
            <label for="mail">Votre E-mail</label>
            <input id="mail" type="email" name="mail" placeholder="jean.dupont@gmail.com" required>
        </div>
        <div>
            <label for="objet">Objet</label>
            <input id="objet" type="text" name="objet" placeholder="Vous rejoindre" required>
        </div>
        <div>
            <label for="message" id="label-textarea">Votre Message</label>
            <textarea id="message" name="message" placeholder="Votre message ici !" required></textarea >
        </div>
        <div>
            <input id="bouton_form_contact" type="submit" value="Envoyer" class="button_dark_gold">
        </div>
    </form>
    
</section>

<?php

require 'app/Views/Front/footer.php'

?>