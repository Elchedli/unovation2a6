<?php
class Client{
        static function AjouterClient($produit,$db){
            try{
                $sql = "INSERT INTO client (pseudo_client,nom,mail,mdp_client,adr_client,tel_client) VALUES (?,?,?,?,?,?)";
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
                        title: 'Votre Incscription est faite.',
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
}
?>