
<?php
	header('Content-Type: application/json');
	include "../basepdo.php";
	$page = "https://www.tunisianet.com.tn/475-fourniture-ecriture-scolaire-tunisie?categories=fourniture-stylos-feutres-rollers-tunisie&page=3";
	$url = file_get_contents($page);
    $www = explode('class="wb-image-block col-lg-3 col-xl-3 col-md-4 col-sm-4 col-xs-6"',$url,2);
    $www = explode('<h2 class="h3 product-title" itemprop="name">',$www[1]);
	$i=1;
    while(isset($www[$i])){
        $image = explode('">',$www[$i],2);
        $image = explode('</a>',$image[1],2);
        $nom = $image[0];
		$i++;
	}
?>