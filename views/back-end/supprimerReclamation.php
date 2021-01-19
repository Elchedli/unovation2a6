<?PHP
include "../../Core/ReclamationC.php";
include "../../config.php";
$reclamationC=new ReclamationC();
if (isset($_POST["idreclamation"])){
	$reclamationC->supprimerReclamation($_POST["idreclamation"]);
	header('Location: AfficherReclamation.php');
}

?>