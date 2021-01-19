<?php
	//include "../config.php";
	class CommandeC{
		function afficherCommande($commande){
			echo "Id: ".$commande->getId()."<br>";
			echo "pseudo_client: ".$commande->getIdClient()."<br>";
			echo "Etat: ".$commande->getEtat()."<br>";
			echo "Date Place: ".$commande->getDatePlace()."<br>";
        }
        
		function ajouterCommande($commande){
			$sql = "INSERT INTO Commande( idCom, etat, datePlace) values(:idClient, :etat, :datePlace)";
			$db = config::getConnexion();
			try{
		       	$req = $db->prepare($sql);
		       	$idClient = $commande->getIdClient();
		       	$etat = $commande->getEtat();
		       	$datePlace = $commande->getDatePlace();
		        $req->bindValue(':idClient', $idClient);
		        $req->bindValue(':etat', $etat);
		        $req->bindValue(':datePlace', $datePlace);
				$req->execute(); 
		    }catch(Exception $e){
		        echo 'Erreur: '.$e->getMessage();
		    }
		}
		function afficherCommandes(){
			$sql = "SELECT * FROM Commande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}catch(Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }	
		}
		function supprimerCommande($id){
			$sql = "DELETE FROM Commande where id = :id";
			$db = config::getConnexion();
		    $req = $db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
		        $req->execute();
		    }catch(Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function modifierCommande($commande, $id){
            $sql = "UPDATE Commande SET idClient = :idClient, etat = :etat, datePlace = :datePlace WHERE id = :id";
            $db = config::getConnexion();
            try{
                $req = $db->prepare($sql);
                $idClient = $commande->getIdClient();
                $etat = $commande->getEtat();
                $datePlace = $commande->getDatePlace();
                $datas = array(':idClient' => $idClient, ':etat' => $etat, ':datePlace' => $datePlace, ':id' => $id);
                $req->bindValue('idClient', $idClient);
                $req->bindValue('etat', $etat);
                $req->bindValue('datePlace', $datePlace);
                $req->bindValue('idClient', $idClient);
                $req->bindValue(':id', $id);
                $s = $req->execute();
            }catch(Exception $e){
                echo " Erreur ! ".$e->getMessage();
                echo " Les datas : " ;
                print_r($datas);
            }
        }
		function recupererCommande($id){
			$sql = "SELECT * FROM Commande where id = $id";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}   catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function nbProduits($idCommande){
			$sql = "SELECT COUNT(*) FROM ProduitCommande where idCommande = $idCommande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				foreach($liste as $row){
					return $row['COUNT(*)'];
				}
			}catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function recupererIdParClientEtEtat($idClient){
			$sql = "SELECT id FROM Commande WHERE idClient = $idClient AND etat = 1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				if($liste->rowCount() != 0){
					foreach($liste as $row){
						return $row['id'];
					}
				}else{
					return -1;
				}
			}catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function recupererIdClientParIdCommandeEtEtat($idCommande){
			$sql = "SELECT idClient FROM Commande WHERE id = $idCommande AND etat = 1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				if($liste->rowCount() != 0){
					foreach($liste as $row){
						return $row['idClient'];
					}
				}else{
					return -1;
				}
			}catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function recupererIdClientParIdCommande($idCommande){
			$sql = "SELECT idClient FROM Commande WHERE id = $idCommande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				if($liste->rowCount() != 0){
					foreach($liste as $row){
						return $row['idClient'];
					}
				}else{
					return -1;
				}
			}catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function recupererCommandesParIdClientEtEtat($idClient){
			$sql = "SELECT * FROM Commande where idClient = $idClient AND etat = 0 ORDER BY datePlace";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}   catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function recupererCommandeActuelle($idClient){
			$sql = "SELECT * FROM Commande WHERE idClient = $idClient AND etat = 1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
		function recupererEtatParId($id){
			$sql = "SELECT etat FROM Commande WHERE id = $id";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				foreach($liste as $row){
					return $row['etat'];
				}
			}catch (Exception $e){
		        die('Erreur: '.$e->getMessage());
		    }
		}
	}
?>