
<?PHP

include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/core/PanierC.php');
$panierC=new PanierC();
if (isset($_POST['idPanier']) && isset($_POST['qty']) ){
	$qty = $_POST['qty'];
	$id = $_POST["idPanier"];
	$panierC->modifQte($id, $qty);
	header('Location: shopping-cart.php');
}

?>
