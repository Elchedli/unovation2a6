<?php
error_reporting(0);
  include_once "../../basepdo.php";
  $choix = $_POST['choix'];
  $prod = $_POST['prod'];
  session_start();
  if($choix){
    $_SESSION["favoris"].="_$prod";
    try{
        $sql = "UPDATE client SET favoris=? WHERE pseudo_client=?";
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$_SESSION["favoris"]);
        $smt->bindValue(2,$_SESSION["client"]);
        $smt->execute();
    }catch (Exception $e){
        echo $e->getMessage();
    }
  }else{
    $_SESSION["favoris"] = str_replace("_$prod","",$_SESSION["favoris"]);
    try{
        $sql = "UPDATE client SET favoris=? WHERE pseudo_client=?";
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$_SESSION["favoris"]);
        $smt->bindValue(2,$_SESSION["client"]);
        $smt->execute();
    }catch (Exception $e){
        echo $e->getMessage();
    }
  }
?>