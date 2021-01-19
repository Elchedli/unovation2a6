<?php 
session_start();
if(isset($_SESSION['login_in']) and isset($_POST['Quantite']))
{
?>

<?PHP
require_once "../../basepdo.php";
require_once "../../config.php";
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/entities/SuiviPanier.php');
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/core/SuiviPanierC.php');


/*if (isset($_POST['IdPanier']) and isset($_POST['IdClient']) and isset($_POST['nom_prod'])  and isset($_POST['prix_prod']))
{

$panier1=new Panier($_POST['IdPanier'],$_POST['IdClient'],$_POST['nom_prod'],$_POST['prix_prod']);*/

$commande=new CommandeC();
$rech=$commande->recherchernom_prod($_POST["IdPanier"]);
foreach ($rech as $key) {
    $nom_prod=$key['nom_prod'];
}
$re=$commande->rechercherstock($nom_prod);
foreach ($re as $ke) {
    $stock=$ke['stock'];
}

$info=$commande->decrementstock($nom_prod,$_POST['Quantite'],$stock);
$info=$commande->recupererCommande($_POST["IdPanier"]);
//var_dump($info->fetch());
//$info->fetchall();
foreach ($info as $inf) 
{
$commande1=new Commande($inf["IdPanier"],$inf["nom_prod"],$inf["prix_prod"],$_POST['Quantite'],$_SESSION['nom']);
//echo $_POST['Quantite'];




//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$commande1C=new CommandeC();
$commande1C->ajouterCommande($commande1);

   /* include "../../Core/FideliteC.php";
    $F=new FideliteC();
    $d=$_POST['Quantite']*$inf["prix_prod"];
    $k=(int)$d/10;
    $ptt=$F->recupererfidelite((int)$_SESSION['id']);
    var_dump((int)$k);
    foreach ($ptt as $pp)
        $bhim=$pp['pt_fd'];

    $F->miseptfidelite((int)$_SESSION['id'],(int)$bhim+(int)$k);*/
header('Location:shopping-cart.php');
}

//*/

?>
<?php
}
    else
        header('location:./login.php');
?>