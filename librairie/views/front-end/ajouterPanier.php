<?PHP
require_once "../../basepdo.php";
require_once "../../config.php";
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/entities/Panier.php');
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/core/PanierC.php');
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/core/ProduitC2.php');

if (isset($_GET['nom_prod'])){
	$produitC=new ProduitC2();
	$resultat=$produitC->recupererProduit($_GET['nom_prod'],$db);
	//$r2=$produitC->recuperersolde($_GET['nom_prod']);
	var_dump($resultat);
	foreach($resultat as $row){
		$nom_prod=$row['nom_prod'];
		$marque=$row['marque'];
		$stock=$row['stock'];
		$type_prod=$row['type_prod'];
		$prix_prod=$row['prix_prod'];
		$desc_prod=$row['desc_prod'];
		$nom_cat=$row['nom_cat'];
		$photo_prod=$row['photo_prod'];

	}
	//foreach ($r2 as $key ) 
	//	$newprix_prod=$key["Nouveauprix_prod"];
if ($desc_prod=="NON SOLDE")
{
$panier1=new Panier(1,$nom_prod,$marque,$prix_prod,$photo_prod);
$panier=new PanierC();
$panier->ajouterPanier($panier1);	
}
else if($desc_prod=="solde")
{
$panier1=new Panier(1,$nom_prod,$marque,$newprix_prod,$photo_prod);
$panier=new PanierC();
$panier->ajouterPanier($panier1);	
}

//var_dump($info->fetch());
//$info->fetchall();




//Partie2
/*
var_dump($employe1);
}
*/
//Partie3

	header('Location:shopping-cart.php');
	
//*/

?>
<?php
}
    else
        header('location:./login.php');
      ?>