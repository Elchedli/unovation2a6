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

        }
        table, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>Affichage des Clubs</h3>
    <table >
        <tr>
            <td>Id</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Adresse</td>
            <td>Domaine</td>
        </tr>
        <tr>
        <?php
            $id = $_GET["id"];
            $nom = $_GET["nom"];
            $desc = $_GET["desc"];
            $adr = $_GET["adr"];
            $domaine = $_GET["domaine"];
            echo "
                <td>$id</td>
                <td>$nom</td>
                <td>$desc</td>
                <td>$adr</td>
                <td>$domaine</td>
            ";
        ?>
        </tr>
    </table>    
</body>
</html>
