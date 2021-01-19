<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display:table;
            margin: 0 auto;
        }
        body h3{
            font-size: 30px;
            text-align: center;

        }
        table, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>Affichage des Clubs</h3>
    <table>
        <tr>
            <td>Id</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Adresse</td>
            <td>Domaine</td>
        </tr>
    <?php
        include_once "config.php";
        config::getConnexion();
        class Club{
            private $id;
            private $nom;
            private $description;
            private $adresse;
            private $domaine; 
            function __construct() {
                // $this->id = $_POST["id"];
                // $this->nom = $_POST["nom"];
                // $this->description =  $_POST["desc"];
                // $this->adresse =  $_POST["adr"];
                // $this->domaine =  $_POST["domaine"];
            }
            public function afficherClub(){
                try{
                    $smt = config::$instance->prepare("select * from club");
                    if($smt->execute()  && $smt->rowCount() > 0){
                        $results = $smt->fetchAll(PDO::FETCH_OBJ);
                        
                        foreach ($results as $key => $value) {
                            echo "<tr>";
                            echo "
                                <td>$value->id</td>
                                <td>$value->nom</td>
                                <td>$value->description</td>
                                <td>$value->adr</td>
                                <td>$value->domaine</td>
                            ";
                            echo " </tr>";
                        }
                    }
                }catch (Exception $e){
                    echo $e->getMessage();
                }              
            }
        }

        $club1 = new Club();
        $club1->afficherClub();
    ?>
    </table>
</body>
</html>