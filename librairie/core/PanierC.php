<?PHP
include_once ($_SERVER["DOCUMENT_ROOT"] . '/librairie/basepdo.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/librairie/config.php');
class PanierC {
function afficherPanier ($Panier){
		echo "IdPanier: ".$Panier->getIdPanier()."<br>";
		echo "Quantite: ".$Panier->getQuantite()."<br>";
		echo "nom_prod : ".$Panier->getnom_prod()."<br>";
		echo "prix_prod: ".$Panier->getprix_prod()."<br>";
	}
	/*function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/
	


	function ajouterPanier($panier1){
		$sql="insert into panier (Quantite,nom_prod,prix_prod,photo_prod) values (:Quantite,:nom_prod,:prix_prod,:photo_prod)";

		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

//      $idpp=$panier1->getIdPanier();
         $idc=$panier1->getQuantite();
        // **************** $idp=$panier1->getIdProduit();
        $nom=$panier1->getnom_prod();
        $p=$panier1->getprix_prod();
         $i=$panier1->getphoto_prod();



   



       // $req->bindValue(':idpanier',$idpp);
		$req->bindValue(':Quantite',$idc);
		//$req->bindValue(':idproduit',$idp);
		$req->bindValue(':nom_prod',$nom);
		$req->bindValue(':prix_prod',$p);
				$req->bindValue(':photo_prod',$i);



		



            $req->execute();
         

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}


		function chercherPaniers($idp){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SELECT * FROM panier where IdPanier like '%$idp%' ";
		$db = config::getConnexion();
		  $req=$db->prepare($sql);
		
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	
	function afficherPaniers(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}		

	function afficherCommandes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}		

	function afficherPaniersTrier(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From panier Order by  IdPanier asc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}	
	function modifQte($id, $qty){
		$sql = "UPDATE panier SET Quantite = $qty WHERE id_pan = $id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}	

	function estCommande($id, $nom){
		$sql = "SELECT * FROM commande WHERE id_pan = $id AND pseudo_client = '$nom'";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste->rowCount() != 0;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function ajouterCommande($id, $nom){
		$sql = "INSERT INTO commande (id_pan, pseudo_client) VALUES ($id, '$nom')";
		$db = config::getConnexion();
		try{
			$smt = $db->prepare($sql);
			$smt->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}






	/*
	function supprimerPanier($idp){
		$sql="DELETE FROM panier WHERE id_pan=:idpanier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idpanier',$idp);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	} */

	function supprimerPanier($idp){
		$sql="DELETE FROM panier WHERE id_pan=:idpanier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idpanier',$idp);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function viderpanier(){
		$sql="DELETE FROM panier ";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function vidercommande(){
		$sql="DELETE FROM commande ";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierPanier($panier,$idpanier){
		$sql="UPDATE panier SET  Quantite=:Q,IdProduit=:IDP,nom_prod=:NP,prix_prod=:PP WHERE IdPanier=:idf";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $q=$panier->getQuantite();
        $idp=$panier->getIdProduit();
        $np=$panier->getnom_prod();
        $pp=$panier->getprix_prod();
		$datas = array(':idf'=>$idpanier, ':Q'=>$q,':IDP'=>$idp,':NP'=>$np,':PP'=>$pp);
		$req->bindValue(':Q',$q);
		$req->bindValue(':IDP',$idp);
		$req->bindValue(':NP',$np);
		$req->bindValue(':PP',$pp);
		$req->bindValue(':idf',$idpanier);

		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererPanier($id){
		$sql="SELECT * from produit where nom_prod=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererPanier2($id){
		$sql="SELECT * from panier where IdPanier=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListePanier($prixx){
		$sql="SELECT * from panier where prix_prod=$prixx";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>