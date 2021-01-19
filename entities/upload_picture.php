<?php

if(!isset($_SESSION["user"])){
    echo"<script>window.location.href = 'acceuil.php';</script>";
}
function upload_picture($file){
	$target_dir = realpath(dirname(__FILE__))."/../uploads/";
	$target_file = $target_dir . basename($file["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	  $check = getimagesize($file["tmp_name"]);
	  if($check !== false) {
		  if (move_uploaded_file($file["tmp_name"], $target_file)) {
			return basename($file["name"]);
		  }
	  } else {
		return null;
	  }

}

?>