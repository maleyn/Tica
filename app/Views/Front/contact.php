<?php

require 'app/Views/Front/header.php';

?>

<section id="contact-form" class="pagepadding-top container-med">
    <form id="contact" action="index.php?action=submitContact" method="post">
        <h1>Nous Contacter</h1>
        
        <div>
            <label for="lastname">Votre Nom</label>
            <input type="text" name="lastname" required autofocus>
        </div>
        <div>
            <label for="firstname">Votre Prénom</label>
            <input type="text" name="firstname" required autofocus>
        </div>
        <div>
            <label for="mail">Votre E-mail</label>
            <input type="email" name="mail" value="" required autofocus>
        </div>
        <div>
            <label for="objet">Objet</label>
            <input type="text" name="objet" value="">
        </div>
       <div>
            <label for="message">Votre Message</label>
            <textarea rows="10" cols="20" name="message" placeholder="Votre message ici !"></textarea>
       </div>
        
    </form>
</section>

<?php

require 'app/Views/Front/footer.php'

?>