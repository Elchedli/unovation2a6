<?php
class Produit{
    private $names = array("nom_prod","prix_prod","photo_prod","description","stock");
        static function AjouterProduit($produit,$db){
            try{
                if(!is_numeric($produit[1]) || !is_numeric($produit[5])){
                    echo"<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Prix et Stock doit etre un nombre!'
                    })</script>";
                    throw new Exception();
                }
                //var_dump($produit);
                $sql = "INSERT INTO produit (nom_prod,prix_prod,photo_prod,marque,desc_prod,stock,nom_cat,type_prod) VALUES (?,?,?,?,?,?,'Adhésifs, Agrafage & Découpe',?)";
                $smt = $db->prepare($sql);
                $i = 0;
                foreach ($produit as $element){
                    $i++;
                    $smt->bindValue($i,$element);
                }
                if($smt->execute()){
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
        function ModifierProduit($produit,$db){
            if((!is_numeric($produit[2]) && $produit[2] != "") || (!is_numeric($produit[5]) && $produit[5] != "")){
                echo"<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Prix et Stock doit etre un nombre!'
                })</script>";
                return NULL;
            }
            $names = $this->names;
            $sql = "UPDATE produit SET ";
            $j=0;
            for($i=1;$i<6;$i++){
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
                echo($sql);
                if($smt->execute()){
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
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
        static function SupprimerProduit($produit,$db){
            try{
                $smt = $db->prepare("DELETE FROM produit WHERE nom_prod = ? ;");
                $smt->bindValue(1,$produit);
                if($smt->execute()){
                    echo"<script>Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Le produit est supprimer.',
                        showConfirmButton: false,
                        timer: 800
                      })</script>"; 
                }else{
                    print_r($smt->errorInfo());
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