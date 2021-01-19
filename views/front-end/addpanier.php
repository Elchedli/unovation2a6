<?php
require '_header.php';
if(isset($_GET['nom_prod'])){
	$produit=$DB->query('SELECT nom_prod FROM produit WHERE nom_prod=:nom_prod', array('nom_prod' => $_GET['nom_prod']));
	if (empty($produit)){
		die("ce produit n'existe pas");
	}
	$Panier->add($produit[0]->nom_prod);
	die('le produit a bien ete ajoute <a herf="javascript:history.back()">retourner sur le catalogue</a>');
}
else{
	die("vous n'avez pas selectionne de produit ");
}

?>