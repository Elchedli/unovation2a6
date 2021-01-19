<?PHP
class Panier{
	private $IdPanier;
	private $Quantite;
	private $nom_prod;
	private $prix_prod;
	private $photo_prod;

	function __construct($Quantite,$nom_prod,$prix_prod,$photo_prod){
		$this->Quantite=$Quantite;
		$this->nom_prod=$nom_prod;
		$this->prix_prod=$prix_prod;
		$this->photo_prod=$photo_prod;

	}
	
	function getIdPanier(){
		return $this->IdPanier;
	}
	function getQuantite(){
		return $this->Quantite;
	}

	function getnom_prod(){
		return $this->nom_prod;
	}
	function getprix_prod(){
		return $this->prix_prod;
	}
		function getphoto_prod(){
		return $this->photo_prod;
	}

	
	function setIdPanier($IdPanier){
		$this->IdPanier=$IdPanier;
	}
	function setQuantite($Quantite){
		$this->Quantite;
	}

	function setnom_prod($nom_prod){
		$this->nom_prod=$nom_prod;
	}
	function setprix_prod($prix_prod){
		$this->prix_prod=$prix_prod;
	}
	function setphoto_prod($photo_prod){
		$this->photo_prod=$photo_prod;
	}
}

?>