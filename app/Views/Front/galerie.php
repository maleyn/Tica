<?php

require 'app/Views/Front/header.php';

?>

<main class="container pagepadding-top">
    <h1 class="uppercase text-center">galerie</h1>
    <?php foreach($paints as $paint) { ?>
        <article class="card-galerie">
            <img src="" alt="">

        </article>

    <?php } ?> 



</main>


<?php

require 'app/Views/Front/footer.php'

?>