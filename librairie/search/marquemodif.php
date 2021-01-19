<?php
	header('Content-Type: application/json');
	include "basepdo.php";
	include "core/produit.php";
	$p = new Produit();
	$page = "https://www.tunisianet.com.tn/475-fourniture-ecriture-scolaire-tunisie?page=2";
	$url = file_get_contents($page);
	$www = explode('class="wb-image-block col-lg-3 col-xl-3 col-md-4 col-sm-4 col-xs-6"',$url);
    for($i=1;$i<25;$i++){
		$image = explode('"',$www[$i],11);
		$link = $image[1];
		$test1 = $image[9];
        $test2 = $image[7];
        $marque = explode('logo" alt=',$image[10],2);
        $marque = explode('"',$marque[1],3);
        $marque = $marque[1];
        $p->ModifierMarque($marque,$test1,$db);
        echo $test1."   ".$marque."\n";
	}
?>