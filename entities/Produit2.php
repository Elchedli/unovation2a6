<?PHP
class Produit2{

	private $nom_prod;
	private $stock;
	private $marque;
	private $type_prod;
	private $prix_prod;
	private $desc_prod;
	private $nom_cat;
	private $photo_prod;
	function __construct($nom_prod,$stock,$type_prod,$prix_prod,$desc_prod,$nom_cat,$photo_prod){
		
		$this->nom_prod=$nom_prod;
		$this->stock=$stock;
		$this->type_prod=$type_prod;
		$this->prix_prod=$prix_prod;
		$this->desc_prod=$desc_prod;
		$this->nom_cat=$nom_cat;
		$this->photo_prod=$photo_prod;
	}
	
	function getIdproduit(){
		return $this->IdProduit;
	}

	function getnom_prod(){
		return $this->nom_prod;
	}
	function getmarque(){
		return $this->marque;
	}
	function getstock(){
		return $this->stock;
	}
	function gettype_prod(){
		return $this->type_prod;
	}
	function getprix_prod(){
		return $this->prix_prod;
	}
	function getdesc_prod(){
		return $this->desc_prod;
	}
	function getnom_cat(){
		return $this->nom_cat;
	}
	function getphoto_prod(){
		return $this->photo_prod;
	}


function setnom_prod($nom_prod){
		$this->nom_prod=$nom_prod;
	}
	function setstock($stock){
		$this->stock=$stock;
	}
	function setmarque($stock){
		$this->marque=$marque;
	}
	function settype_prod($type_prod){
		$this->type_prod=$type_prod;
	}
	function setprix_prod($prix_prod){
		$this->prix_prod=$prix_prod;
	}
	function setdesc_prod($desc_prod){
		$this->desc_prod=$desc_prod;
	}
	function setnom_cat($nom_cat){
		$this->nom_cat=$nom_cat;
	}

	function setphoto_prod($photo_prod){
		$this->photo_prod=$photo_prod;
	}

	
}

?>