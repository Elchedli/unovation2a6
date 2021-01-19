<?php 
include '../../basepdo.php';
$name = $_POST["name"];
//$choix = "username";
//$name = "no";
        try{
            $smt = $db->prepare("select * from utilisateur where pseudo_u=?");
            $smt->bindValue(1, $name);
            if($smt->execute()  && $smt->rowCount() > 0){
                $results = $smt->fetchAll(PDO::FETCH_OBJ);
                foreach( $results as $k => $v ){
                    echo"<div class='login100-form-avatar'><img src='images/users/".$v->image_u."'alt='AVATAR'></div>";
                    echo"<span class='login100-form-title p-t-20 p-b-45'>".$v->nom_u."</span>";
                }
                         
            }else{
                echo"<div class='login100-form-avatar'><img src='images/default.png' alt='AVATAR'></div>";
                echo"<span class='login100-form-title p-t-20 p-b-45'>Utilisateur</span>";
            }
        } catch (Exception $e){
            echo $e->getMessage();
        }
?>