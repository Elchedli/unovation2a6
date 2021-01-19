<?PHP
include_once ($_SERVER["DOCUMENT_ROOT"] . '/librairie/config.php');
require_once "../../basepdo.php";
class CommandeC {
function afficherCommande ($Commande){
		echo "nom_prodCommande: ".$Commande->getnom_prodCommande()."<br>";
		echo "nom_prodPanier: ".$Commande->getnom_prodPanier()."<br>";
		echo "nom_prod: ".$Commande->getnom_prod()."<br>";
		echo "prix_prod : ".$Commande->getprix_prod()."<br>";
		echo "Quantite: ".$Commande->getQuantite()."<br>";
		echo "NomClient: ".$Commande->getNomClient()."<br>";
	}
	/*function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/
	
	function ajouterCommande($Commande1){
		$sql="insert into commande (nom_prodPanier,nom_prod,prix_prod,Quantite,NomClient) values (:nom_prodpanier,:nom_prod,:prix_prod,:quantite,:nc)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $nom_prodp=$Commande1->getnom_prodPanier();
        $nom=$Commande1->getnom_prod();
        $pp=$Commande1->getprix_prod();
        $q=$Commande1->getQuantite();
         $N=$Commande1->getNomClient();

		$req->bindValue(':nom_prodpanier',$nom_prodp);
		$req->bindValue(':nom_prod',$nom);
		$req->bindValue(':prix_prod',$pp);
		$req->bindValue(':quantite',$q);
				$req->bindValue(':nc',$N);

            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
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

	function supprimerCommande($nom_prodc){
		$sql="DELETE FROM commande where nom_prodCommande= :nom_prodcommande";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':nom_prodcommande',$nom_prodc);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	function modifierCommande($commande,$nom_prodcommande){
		$sql="UPDATE commande SET nom_prodCommande=:nom_prodC, nom_prodPanier=:nom_prodP,nom_prod=:NP,prix_prod=:PP,Quantite=:Q,NomClient=:NC WHERE nom_prodCommande=:nom_prodcC";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$nom_prodc=$commande->getnom_prodCommande();
        $nom_prodp=$commande->getnom_prodPanier();
        $np=$commande->getnom_prod();
        $pp=$commande->getprix_prod();
        $q=$commande->getQuantite();
        $n=$commande->getNomClient();

		$datas = array(':nom_prodpan'=>$nom_prodpanier, ':nom_prodF'=>$nom_prodf, ':nom_prodC'=>$nom_prodc,':nom_prodP'=>$nom_prodp,':NP'=>$np,':PP'=>$pp);
		$req->bindValue(':nom_prodC',$nom_prodc);
		$req->bindValue(':nom_prodP',$nom_prodp);
		$req->bindValue(':NP',$np);
		$req->bindValue(':PP',$pp);
		$req->bindValue(':Q',$q);
				$req->bindValue(':NC',$n);

		$req->bindValue(':nom_prodcC',$nom_prodcommande);

		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererCommande($nom_prod){
		$sql="SELECT * from panier where nom_prodPanier=$nom_prod";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	/*function recherchernom_prod($nom_prod){
		$sql="SELECT nom_prod from panier where nom_prodPanier=$nom_prod";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/

	function decrementstock($nom_prod,$QUANTITE,$stock){
		$sql="UPDATE produit SET stock=:stock WHERE nom_prod=:nom_prod";
		
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $stock=$stock-$QUANTITE;

		
		
		$req->bindValue(':stock',$stock);
		$req->bindValue(':nom_prod',$nom_prod);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   
        }
		
	}

	
	function rechercherListeCommande($prixx){
		$sql="SELECT * from commande where prix_prod=$prixx";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function rechercherstock($prixx){
		$sql="SELECT stock from produit where nom_prod=$prixx";
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