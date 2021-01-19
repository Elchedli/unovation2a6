
<?php
	header('Content-Type: application/json');
	include "../basepdo.php";
	$page = "https://www.tunisianet.com.tn/572-tableau-bureautique-tunisie?categories=tableaux-blancs,tableaux-en-liege,tableaux-vitrine&page=2";
	$url = file_get_contents($page);
	$www = explode('class="wb-image-block col-lg-3 col-xl-3 col-md-4 col-sm-4 col-xs-6"',$url);
	$i=1;
    while(isset($www[$i])){
		$www1 = explode('<h2 class="h3 product-title" itemprop="name">',$www[$i],2);
		$content = explode('">',$www1[1],2);
        $content = explode('</a>',$content[1],2);
        $nom = $content[0];
        $sql = "DELETE FROM produit WHERE nom_prod = ? ";
        try{
            $smt = $db->prepare($sql);
            $smt->bindValue(1,$nom);
            $smt->execute();
            echo "$nom DELETETED.\n";
        }catch (Exception $e){
            echo $e->getMessage();
        }
		$i++;
	}
?>