<?php
    class Club{
        private $id;
        private $nom;
        private $description;
        private $adresse;
        private $domaine; 
        function __construct() {
            $this->id = "1";
            $this->nom = "Club Robotique";
            $this->description = "Test";
            $this->adresse = "Esprit Ghazela";
            $this->domaine = "Electromecanique";
        }
        public function afficherClub(){
            echo "id : $this->id nom : $this->nom description : $this->description adresse : $this->adresse domaine : $this->domaine";
        }
    }

    $test = new Club();
    $test->afficherClub();
?>