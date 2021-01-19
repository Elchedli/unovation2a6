<?php
    include "../../core/PanierC.php";
    session_start();
	if(isset($_POST['idPanier']) and isset($_POST['nom'])){
		$commandeC = new PanierC();
        $commandeC->ajouterCommande($_POST['idPanier'], $_POST['nom']);
        $sql="SELECT mail FROM client WHERE pseudo_client=:idpanier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idpanier',$_SESSION['client']);
		try{
            $req->execute();
            $liste = $req->fetch();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
      
        ?>
        <form action="../../entities/receipt.php" method="POST" id="f">
            <input type="hidden" value="1" name="choix">
            <input type="hidden" value="<?php echo $_POST['prix'];?>" name="prix">
            <input type="hidden" value="<?php echo $_POST['qte'];?>" name="qte">
            <input type="hidden" value="<?php echo $_POST['nomprod'];?>" name="nomprod">
            <input type="hidden" value="<?php echo $_POST['nom'];?>" name="nom">
            <input type="hidden" value="<?php echo $liste[0];?>" name="adresse">
        </form>
        <script>
            document.getElementById('f').submit();
        </script>
        <?php
		//header('Location: shopping-cart.php');	
	}else{
		echo "Verifier les champs";
	}
?>