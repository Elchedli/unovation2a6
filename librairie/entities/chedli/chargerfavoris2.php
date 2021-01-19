
<?php
    error_reporting(0);
    include_once "../../basepdo.php";
    $prod = $_POST['prod'];
    session_start();
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
    if(empty($_SESSION["favoris"])){
        ?>
        <script>
            $('#hideafter').hide();
            $(".rowanda").html("<p style='margin:auto auto'>Vous n'avez pas de favoris.</p>");
        </script>
        <?php
    }
?>
<script>

</script>