<?php
    $name = $_GET['name'];
    $mdp = $_GET['pass'];
    include '../../basepdo.php';
    session_start();
    try{
        var_dump($name);
        var_dump($pass);
        $sql = "SELECT pseudo_client,mail,favoris,mdp_client FROM client WHERE (pseudo_client=? OR mail=?) AND mdp_client = ?";
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$name); 
        $smt->bindValue(2,$name);
        $smt->bindValue(3,$mdp);
        if($smt->execute() && $smt->rowCount() > 0){
            $all = $smt->fetch();
            $_SESSION["client"] = $all['pseudo_client'];
            $_SESSION["favoris"] = $all['favoris'];
            echo"<script>window.location.href = 'index.php';</script>";
        }else{
            echo"<script>
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Utilisateur Incorrect.',
                showConfirmButton: false,
                timer: 800
            })</script>";
        }
    } catch (Exception $e){
        echo $e->getMessage();
    }
?>