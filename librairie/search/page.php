<?php
	header('Content-Type: application/json');
	$page = "https://www.tunisianet.com.tn/475-fourniture-ecriture-scolaire-tunisie?categories=fourniture-stylos-feutres-rollers-tunisie&page=3";
	$url = file_get_contents($page);
	echo $url;
?>