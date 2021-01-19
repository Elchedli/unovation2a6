<?php


class Panier
{
    public
	function __construct()
	{
		if (!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['Panier'])){
			$_SESSION['Panier']=array();
		}
	}
	public function add($nom_prod){
		$_SESSION['Panier'][$nom_prod]=1;
	}
}


?>