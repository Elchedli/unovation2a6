<?php 

?>
<?PHP
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/core/PanierC.php');
$panierC=new PanierC();
if (isset($_POST["jk"])){
  $panierC->supprimerPanier($_POST["jk"]);
  header('Location: shopping-cart.php');
}

?>
<?php

    
      ?>