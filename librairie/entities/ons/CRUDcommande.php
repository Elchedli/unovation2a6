<?php
  require_once "../../basepdo.php";
  $choix = $_POST['choix'];
  switch($choix){
      case 0:
        $name = $_POST['name'];
        if($name === "") $sql = "SELECT * FROM commande LIMIT 40";
        else $sql = "SELECT * FROM commande WHERE id_com=? LIMIT 40";
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$name);
        if($smt->execute()){ 
            $total = $smt->fetchAll();                      
            foreach($total as $content){
                echo "<tr data-nom='$content[0]'>
                    <td class='column1' data-type='nom_prod'><p>$content[0]</p></td>
                    <td class='column2' data-type='prix_prod'><p>$content[1]</p></td>
                    <td class='column3' data-type='photo_prod'><p>$content[2]</p></td>
                    <td class='column4' data-name='$content[0]'><i class='fa fa-times'></i></td>
                </tr>";
            }
            
            ?>
            <script>
                $('.column8').on('click',function() {
                    nom = $(this).data("name");
                    $(".worktodo").load("../../entities/chedli/CRUDproduit.php",{
                        choix: 1,
                        name: nom
                    });
                    $(this).parent('tr').remove();
                });

                $('td').on('click', function(){
            ca = $(this);
            bartxt = $('<input>', {
                id: "change",
                class: "form-control",
                onblur: "magic()",
                value: ca.text(),
                type: 'text'
            }).appendTo(ca.empty()).focus();
        });
        
    
            </script>
            <?php
        }
      break;
      case 1:
        $name = $_POST['name']; 
        $smt = $db->prepare("DELETE FROM commande WHERE id_com=?");
        $smt->bindValue(1,$name);
        if($smt->execute()){
            echo"<script>Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'La commande est est supprimée.',
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
      break;
      case 2:
        $produit = $_POST['produit'];
        $sql = "INSERT INTO produit (nom_prod,prix_prod,photo_prod,stock,type_prod,marque,desc_prod,nom_cat) VALUES (?,?,?,?,?,?,?,?)";
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
      break;
      case 3:
        $produit = $_POST['produit'];
        if($produit[0] == 'stock' && $produit[2] < 10){
            $sql = "INSERT INTO notif (mess) VALUES (?)";
            $smt = $db->prepare($sql);
            $message = "$produit[2] a besoin de se restocker.";
            $smt->bindValue(1,$message);
            if($smt->execute()){
                echo"<script>swal({
                    title: '$produit[2] est moins de 10.Attention.',
                  })</script>"; 
            }
        }
        $sql = "UPDATE produit SET $produit[0]=? WHERE nom_prod=?";
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$produit[1]);
        $smt->bindValue(2,$produit[2]);
        if($smt->execute()){
            echo"<script>Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '$produit[0] a étè modifiée.',
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
      break;
  }
  
    
?>