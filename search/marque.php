<?php
	//$number = $_GET["n"]; 
	$type = $_GET["t"];
	header('Content-Type: application/json');
	include "../basepdo.php";
	include "../core/produit.php";
	$p = new Produit();
	$page = "https://www.tunisianet.com.tn/649-accessoires-de-bureau?categories=regles";
	$type = explode('=',$page,3);
	$type = $type[1];
	$url = file_get_contents($page);
	$www = explode('class="wb-image-block col-lg-3 col-xl-3 col-md-4 col-sm-4 col-xs-6"',$url);
	$i=1;
    while(isset($www[$i])){
		$image = explode('"',$www[$i],11);
		$link = $image[1];
		$test1 = $image[9];
        $test2 = $image[7];
        $marque = explode('logo" alt=',$image[10],2);
        $marque = explode('"',$marque[1],3);
        $marque = $marque[1];
		$image = explode('class="price">',$image[10],3);
		$image = explode('</span>',$image[1],2);
		$prix = substr($image[0],0,-3);
		$produit[0] = $test1;
		$produit[1] = (float) str_replace(",",".",$prix);
		$produit[2] = $test2;
		$produit[3] = $marque;
		$url = file_get_contents($link);
		$www2 = explode('content="',$url,4);
		$www2 = explode('"',$www2[2]);
		$produit[4] = $www2[0];
		$produit[5] = rand(8,100);
		$produit[6] = $type;
		$p->AjouterProduit($produit,$db);
		/*echo "\n";
        for($j=0;$j<6;$j++){
        	echo "$produit[$j]\n";
        }*/
		echo "---------------------------------------\n";
		$i++;
	}
?>