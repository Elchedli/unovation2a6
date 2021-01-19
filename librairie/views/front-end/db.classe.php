<?php 

class DB
{
	private $host ='localhost';
	private $username= 'root';
	private $password= '';
	private $database='librairie';
	private $db;

public function construct($host = null ,$username = null ,$password = null,$database = null){
	if($host != null){
		$this->host=$host;
		$this->username=$username;
		$this->password=$password;
		$this->database=$database;
	}
     try {
     	$this->db = new PDO('mysql:host='.$this->host.';dbname=' .$this->database, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8' , PDO:: ATTR_ERRMODE => PDO:: ERRMODE_WARNING));
      	
      } catch (PDOException $e) {
      	die('<h1>impossible de se connecter a la base </h1>');
      	
      } 
}

public function query($sql , $data = array()){
	$req = $this->db ->prepare($sql);
	$req->execute($data);
	return $req -> fetchAll(PDO::FETCH_OBJ);
}

}

?>