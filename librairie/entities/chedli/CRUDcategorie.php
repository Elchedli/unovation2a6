<?php
$choix = $_POST['choix'];
switch($choix){
    case 1:
        ?>
         <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off" required>
            <label for="Nom" class="label-name">
                <span class="content-name">Nom Categorie</span>
            </label>
        </div>
        <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off" required>
            <label for="Description" class="label-name">
                <span class="content-name">Description</span>
            </label>
        </div>
        <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off">
            <label for="Type" class="label-name">
                <span class="content-name">Multiples types du catégorie</span>
            </label>
        </div>
        <button value="submit" name="ajouter" class="btn btn-outline-success buttenv">Ajouter</button>
        <?php
    break;
    case 2:
        ?>
        <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off" required>
            <label for="Nom Original" class="label-name">
                <span class="content-name">Nom Original</span>
            </label>
        </div>
        <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off">
            <label for="Nom" class="label-name">
                <span class="content-name">Nom</span>
            </label>
        </div>
        <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off">
            <label for="Description" class="label-name">
                <span class="content-name">Description</span>
            </label>
        </div>
        <div class="inputbox">
            <input type="text" name="categorie[]" autocomplete="off">
            <label for="Type" class="label-name">
                <span class="content-name">Multiples types du catégorie</span>
            </label>
        </div>
        <button value="submit" name="modifier" class="btn btn-outline-success buttenv">Modifier</button>
        <?php
    break;
    case 3:
        ?>
        <div class="inputbox">
            <input type="text" name="categorie" autocomplete="off" required>
            <label for="Nom" class="label-name">
                <span class="content-name">Nom Categorie</span>
            </label>
        </div>
        <button value="submit" name="supprimer" class="btn btn-outline-success buttenv">Supprimer</button>
        <?php
    break;
}
?>