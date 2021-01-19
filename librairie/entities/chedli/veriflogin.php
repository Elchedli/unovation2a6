<?php 
include '../../basepdo.php';
$name = $_POST["user"];
$pass = $_POST["mdpass"];
//$name = "nour";
//$pass = "123";
function verif($name,$pass,$db){
    try{
        $smt = $db->prepare("select * from utilisateur where pseudo_u=? AND mdp_u=?");
        $smt->bindValue(1, $name);
        $smt->bindValue(2, $pass);
        if( $smt->execute() &&  $smt->rowCount() > 0){
            return true;        
        }else{
            echo"<script>Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Coordonnées incorrect',
                showConfirmButton: false,
                timer: 800
              })</script>";
            return false;
        }
    } catch (Exception $e){
        echo $e->getMessage();
    }
}
$bool = verif($name,$pass,$db);
if($bool){
    session_start();
    $_SESSION["user"]= $name;
    echo"<script>window.location.href = 'acceuil.php';</script>";
}
?>