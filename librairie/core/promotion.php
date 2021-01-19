<?php
class Promotion{
        	static function listAll($db){
			$stmt = $db->query("SELECT * FROM promotion");
			$result = array();
			while ($row = $stmt->fetch()) {
				$result[] = $row;
			}
			return $result;
		}
		
		static function addPromotion($db, $promotion) {
			$name = $promotion['name'];
			$description = $promotion['description'];
			$pourcentage = intval($promotion['pourcentage']);
			if( ($pourcentage <= 0) or ($pourcentage > 100) )
				return false;
			$expiration = $promotion['expiration'];
			$picture = $promotion['picture'];
			$is_active= filter_var($promotion['is_active'], FILTER_VALIDATE_BOOLEAN);
			$sql = "INSERT INTO `promotion`(`name`, `description`, `Perc_promo`, `dat_promo`, `img_promo`, `is_active`) VALUES (?,?,?,?,?,?)";
			$stmt= $db->prepare($sql);
			if ($stmt->execute([$name, $description, $pourcentage, $expiration, $picture, $is_active])) {
			  return true;
			} else {
			  return false;
			}
		}
		
		static function updatePromotion($db, $promotion, $id){
			$name = $promotion['name'];
			$description = $promotion['description'];
			$pourcentage = intval($promotion['pourcentage']);
			if( ($pourcentage <= 0) or ($pourcentage > 100) )
				return false;
			$sql = "SELECT * FROM `promotion` WHERE id = ?";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(1, $id);
			$stmt->execute();
			if($stmt->columnCount() == 0){
				return false;
			}
			$expiration = $promotion['expiration'];
			$is_active= filter_var($promotion['is_active'], FILTER_VALIDATE_BOOLEAN);
			$sql = "UPDATE `promotion` SET `name`=?,`description`=?,`Perc_promo`=?,`dat_promo`=?, `is_active`= ? WHERE `id` = ?";
			$stmt= $db->prepare($sql);
			if ($stmt->execute([$name, $description, $pourcentage, $expiration, $is_active, $id])) {
				if(isset($promotion['picture'])){
					$picture = $promotion['picture'];
					$sql = "UPDATE `promotion` SET `img_promo`=? WHERE `id` = ?";
					$stmt= $db->prepare($sql);
					if ($stmt->execute([$picture, $id])) {
						return true;
					}else{
						return false;
					}
				}else{
					return true;
				}
			} else {
			  return false;
			}
		}
		
		static function fetchById($db, $id){
			if($id == 0){
				return false;
			}
			$sql = "SELECT * FROM `promotion` WHERE id = ?";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(1, $id);
			$stmt->execute();
			if($stmt->columnCount() == 0){
				return false;
			}
			return $stmt->fetch();
		}
		
		static function deletePromo($db, $id){
			if($id == 0){
				return false;
			}
			$sql = "SELECT * FROM `promotion` WHERE id = ?";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(1, $id);
			$stmt->execute();
			if($stmt->columnCount() == 0){
				return false;
			}else{
				$sql = "UPDATE produit SET promotion_id = 0 WHERE promotion_id=?";
				$stmt = $db->prepare($sql);
				$stmt->execute([$id]);
				$sql = 'DELETE FROM promotion WHERE id = :id';
				$stmt = $db->prepare($sql);
				$stmt->bindValue(':id', $id);
				if($stmt->execute()){
					return true;
				}
			}
			
		}
}
?>