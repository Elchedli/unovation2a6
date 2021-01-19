<?php
	$number = $_GET["n"]; 
	header('Content-Type: application/json');
	include "basepdo.php";
	include "core/produit.php";
	$p = new Produit();
	$page = "https://www.tunisianet.com.tn/475-fourniture-ecriture-scolaire-tunisie?page=$number";
	$url = file_get_contents($page);
	$www = explode('class="wb-image-block col-lg-3 col-xl-3 col-md-4 col-sm-4 col-xs-6"',$url);
	for($i=1;$i<25;$i++){
		$image = explode('"',$www[$i],11);
		$link = $image[1];
		$test1 = $image[9];
		$test2 = $image[7];
		$image = explode('class="price">',$image[10],3);
		$image = explode('</span>',$image[1],2);
		$prix = substr($image[0],0,-3);
		$produit[0] = $test1;
		$produit[1] = (float) str_replace(",",".",$prix);
		$produit[2] = $test2;
		$url = file_get_contents($link);
		$www2 = explode('content="',$url,4);
		$www2 = explode('"',$www2[2]);
		$produit[3] = $www2[0];
		$produit[4] = rand(8,100);
		$p->AjouterProduit($produit,$db);
		echo "\n";
        for($j=0;$j<5;$j++){
        	echo $produit[$j]."\n";
        }
    	echo "---------------------------------------\n";
	}
	
?>