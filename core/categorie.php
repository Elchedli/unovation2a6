<?php
class Categorie{
    private $names = array("nom_cat","desc_cat","type_cat");
        static function AjouterCategorie($produit,$db){
            try{
                $sql = "INSERT INTO categorie (nom_cat,desc_cat,type_cat) VALUES (?,?,?)";
                $smt = $db->prepare($sql);
                $i = 0;
                foreach ($produit as $element){
                    $i++;
                    $smt->bindValue($i,$element);
                }
                $smt->execute();
                if($smt->rowCount() > 0){
                    $sql = "INSERT INTO notif (mess) VALUES (?)";
                    $smt = $db->prepare($sql);
                    $message = "Ajouter (catégorie): $produit[0].";
                    $smt->bindValue(1,$message);
                    $smt->execute();
                    echo"<script>
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Votre nouveau produit est ajoutée.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>";
                }else{
                    echo"<script>
                        Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Coordonnées incorrect.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>";
                }
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        function ModifierCategorie($produit,$db){
            $names = $this->names;
            $sql = "UPDATE categorie SET ";
            $j=0;
            for($i=1;$i<3;$i++){
                if($produit[$i] != ""){
                    $sql .=$names[$i-1]."=?,";
                    $change[$j] = $produit[$i];
                    $j++;
                }
            }
            $sql = substr($sql,0,-1);
            $sql.=" WHERE $names[0] = '$produit[0]' ;";
            try{
                $smt = $db->prepare($sql);
                $i = 0;
                foreach ($change as $element){
                    $i++;
                    $smt->bindValue($i,$element);
                }
                $smt->execute();
                if( $smt->rowCount() > 0){
                    $sql = "INSERT INTO notif (mess) VALUES (?)";
                    $smt = $db->prepare($sql);
                    $message = "Modifier (catégorie): $produit[0].";
                    $smt->bindValue(1,$message);
                    $smt->execute();
                     echo"<script>
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Votre catégorie est modifier.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>"; 
                }else{
                    echo"<script>
                        Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Coordonnées incorrect.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>";
                }
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
        static function SupprimerCategorie($produit,$db){
            try{
                $smt = $db->prepare("DELETE FROM categorie WHERE nom_cat = ? ;");
                $smt->bindValue(1,$produit);
                $smt->execute();
                if($smt->rowCount() > 0){
                    $sql = "INSERT INTO notif (mess) VALUES (?)";
                    $smt = $db->prepare($sql);
                    $message = "Supprimer (catégorie): $produit.";
                    $smt->bindValue(1,$message);
                    $smt->execute();
                    echo"<script>Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'La catégorie est supprimer.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>"; 
                }else{
                    echo"<script>Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Coordonnées incorrect.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>";
                }
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
}
?>