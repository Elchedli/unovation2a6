
<?php
	header('Content-Type: application/json');
	include "../basepdo.php";
    $page = "https://www.tunisianet.com.tn/481-fournitures-scolaires-en-ligne";
    $nom = "Adhésifs, Agrafage & Découpe";
    $des = "Adhésifs, Agrafage & Découpe pour vos besoins bureautique.";
	$url = file_get_contents($page);
    $www = explode('<h5 class="af_subtitle">Catégories</h5>',$url,2);
    $www = explode('class="name">',$www[1]);
    $i=1;
    $liste = "";
    while(isset($www[$i])){
        $titre = explode('</span>',$www[$i],2);
        echo "$titre[0]\n";
        $liste.=",$titre[0]";
        $i++;      
    }
    $liste = substr($liste,1);
    echo $liste;
    $sql = "INSERT INTO categorie (nom_cat,desc_cat,type_cat) VALUES (?,?,?)";
    try{
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$nom);
        $smt->bindValue(2,$des);
        $smt->bindValue(3,$liste);
        $smt->execute();
    }catch (Exception $e){
        echo $e->getMessage();
    }
?>