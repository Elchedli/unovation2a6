
<?php
	header('Content-Type: application/json');
	include "../basepdo.php";
	$page = "https://www.tunisianet.com.tn/475-fourniture-ecriture-scolaire-tunisie?categories=fourniture-stylos-feutres-rollers-tunisie&page=3";
	$url = file_get_contents($page);
	$www = explode('class="wb-image-block col-lg-3 col-xl-3 col-md-4 col-sm-4 col-xs-6"',$url);
	$i=1;
        $sql = "DELETE FROM produit WHERE nom_prod LIKE '%...' ";
        try{
            $smt = $db->prepare($sql);
            $smt->execute();
            echo "$nom DELETETED.\n";
        }catch (Exception $e){
            echo $e->getMessage();
         }
		$i++;
?>