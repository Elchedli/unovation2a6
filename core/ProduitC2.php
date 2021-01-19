<?PHP

class ProduitC2{
	
		function recupererProduit($idp,$db){
		try{
			$sql="SELECT * FROM produit WHERE nom_prod=?";
			$smt = $db->prepare($sql);
			$smt->bindValue(1,$idp);
			$smt->execute();
			if($smt->rowCount() > 0){
				echo "hello";
				return $smt->fetchAll();
			}else{
				echo "mamchech";
			}
			
			
		}catch(Exception $e){
			die('Erreur: '.$e->getMessage());
		}
		/*
		$sql="SELECT * FROM produit WHERE nom_prod=$idp";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }*/
	}
	
/*
	function recuperersolde($idp){
		$sql="SELECT * FROM solde WHERE produit=$idp";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
*/

}
?>