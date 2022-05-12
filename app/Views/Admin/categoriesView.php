<?php ob_start(); ?>
<main id="categories-admin" class="container padding-top20 margin-bottom40">
    <h1>Personnalisation des catégories</h1>
    <h2 class="center text-green"><?php if(isset($confirmUpdate)) { echo $confirmUpdate; } ?></h2>
    <form action="" method="post">
        <h2 class="text-gray padding-top20">Styles de peintures</h2>
        <p class="text-red">Attention ! Vous ne pouvez pas mettre d'espace dans les noms de style, type et câdre</p>
        <div class="padding-top30">
            <label  class="text-blue" for="style">Tout les styles</label>
            <select class="form-text width50 margin-top10" name="style">
                <?php foreach($styles as $style) { ?>
                    <option value="<?= $style['id'] ?>"><?=$style['name']?></option>
                <?php } ?>
            </select>
            <input type="submit" formaction="indexAdmin.php?action=styleDelete" title="Suppression d'un style" class="button_submit" value="Supprimer">
        </div>
        <div class="padding-top10">
            <label  class="text-blue" for="styleAjout">Ajouter un style</label>
            
            <input class="form-text margin-top10 width50" type="text" name="styleAdd">
            <input type="submit" formaction="indexAdmin.php?action=styleAjout" title="Ajout d'un style" class="button_submit" value="Ajouter">
           
        </div>
        <h2 class="text-gray padding-top20">Types de peintures</h2>
        <div class="padding-top30">
            <label  class="text-blue" for="type">Tout les types</label>
            <select class="form-text width50 margin-top10" name="type">
                <?php foreach($types as $type) { ?>
                    <option value="<?= $type['id'] ?>"><?=$type['name']?></option>
                <?php } ?>
            </select>
            <input type="submit" formaction="indexAdmin.php?action=typeDelete" title="Suppression d'un type" class="button_submit" value="Supprimer">
        </div>
        <div class="padding-top10">
            <label  class="text-blue" for="typeAjout">Ajouter un type</label>
            <input class="form-text margin-top10 width50" type="text" name="typeAdd">
            <input type="submit" formaction="indexAdmin.php?action=typeAjout" title="Ajout d'un type" class="button_submit" value="Ajouter">
            
        </div>
        <h2 class="text-gray padding-top20">Types de câdres</h2>
        <div class="padding-top30">
            <label  class="text-blue" for="frame">Tout les câdres</label>
            <select class="form-text width50 margin-top10" name="frame">
                <?php foreach($frames as $frame) { ?>
                    <option value="<?= $frame['id'] ?>"><?=$frame['name']?></option>
                <?php } ?>
            </select>
            <input type="submit" formaction="indexAdmin.php?action=frameDelete" title="Suppression d'un câdre" class="button_submit" value="Supprimer">
        </div>
        <div class="padding-top10">
            <label  class="text-blue" for="frameAjout">Ajouter un câdre</label>
            
            <input class="form-text margin-top10 width50" type="text" name="frameAdd">
            <input type="submit" formaction="indexAdmin.php?action=frameAjout" title="Ajout d'un câdre" class="button_submit" value="Ajouter">
            
            <p><?php if (isset($e)) { echo $e; }?></p>
        </div>
    </form>
</main>
<?php $mainContent = ob_get_clean(); 
require 'templates/template.php';
?>