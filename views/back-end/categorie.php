<!doctype html>
<head>
<link rel="stylesheet" href="assets/css/categorie.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
            $("#ajouter").click(function(e){
            	$("#test").load("../../entities/chedli/CRUDcategorie.php",{
					choix: 1
				});
			});
            $("#modifier").click(function(e){
            	$("#test").load("../../entities/chedli/CRUDcategorie.php",{
					choix: 2
				});
			});	
            $("#supprimer").click(function(e){
            	$("#test").load("../../entities/chedli/CRUDcategorie.php",{
					choix: 3
				});
			});
	});
</script>
<?php 
    error_reporting(0);
    ini_set('display_errors', 0);
    include_once "bar.php";
?>

<div class="allall">
<div class="choisir">
<button type="button" class="btn btn-danger" id="ajouter">Ajouter</button>
<button type="button" class="btn btn-danger" id="modifier">Modifier</button>
<button type="button" class="btn btn-danger" id="supprimer">Supprimer</button>
</div>

<div class="all">
    <form id="test"  name="test" METHOD="POST">
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
    </form>
</div>
</div>


<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
<?php
include_once "../../basepdo.php";
include_once "../../core/categorie.php";
$p = new Categorie;
if(isset($_POST["ajouter"])){
    $categorie = $_POST["categorie"];
    $p->AjouterCategorie($categorie,$db);
}
if(isset($_POST["modifier"])){
    $categorie = $_POST["categorie"];
    $p->ModifierCategorie($categorie,$db);
}
if(isset($_POST["supprimer"])){
    $categorie = $_POST["categorie"];
    $p->SupprimerCategorie($categorie,$db);
}
?>