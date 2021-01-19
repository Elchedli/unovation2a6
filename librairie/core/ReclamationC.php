<?PHP
//include "../config.php";
class ReclamationC {
function AfficherReclamation($reclamation){
		echo "nom : ".$reclamation->getNom()."<br>";
		echo "mail : ".$reclamation->getMail()."<br>";
		echo "sujet : ".$reclamation->getSujet()."<br>";
		echo "textreclamation : ".$reclamation->getTextreclamation()."<br>";
	
	}
	
	/*function calculerSalaire($event){
		echo $event->getDescription() * $event->getDescription();
	}*/
	function AjouterReclamation($reclamation){
		$sql="insert into reclamation (nom,mail,sujet,textreclamation) values (:nom,:mail,:sujet,:textreclamation)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
	
        $nom=$reclamation->getNom();
        $mail=$reclamation->getMail();
        $sujet=$reclamation->getSujet();
        $textreclamation=$reclamation->getTextreclamation();
        
		$req->bindValue(':nom',$nom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':sujet',$sujet);
        $req->bindValue(':textreclamation',$textreclamation);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function AfficherReclamations(){
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function AfficherReclamationss(){
		$sq2="SElECT count(*) as 'nombre' From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sq2);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function supprimerReclamation($idreclamation){
		$sql="DELETE FROM reclamation where idreclamation= :idreclamation";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idreclamation',$idreclamation);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
function TriReclamation($col){
			$sq66="SELECT * from reclamation ORDER By $col";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sq66);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
     }


     function RechercheReclamation($col,$val){
			$sql="SELECT * from reclamation where $col LIKE :val";

	         $db = config::getConnexion();

	         try{
		         $req = $db->prepare($sql);
                 $req->bindValue(':val',$val.'%');
		         $req->execute();
                 $liste = $req->fetchAll();
                  return $liste ;
	             }
	         catch(Exception $e){
             echo 'Erreur: '.$e->getMessage();
	}
} 

function recupererreclamation($idreclamation){
		$sql="SELECT * from reclamation where idreclamation=$idreclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $s){
            die('Erreur: '.$s->getMessage());
        }
	}
	function rechercherListereclamation($idreclamation){
		$sql="SELECT * from reclamation where idreclamation=$idreclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $s){
            die('Erreur: '.$s->getMessage());
        }
	}
	
	
	
}


?>