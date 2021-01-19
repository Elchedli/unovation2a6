<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
<!--
    <div id="preloder"> 
        <div class="loader"></div>
    </div>
-->
    <?php 
        include "bar.php";
    ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Nom</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Totale</th>
                                    <th><i class="ti-close"></i></th>
                                    <th>Commander</th>
                                

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                     include_once "../../basepdo.php";
                                     include "../../core/PanierC.php";
                                    $panierC = new PanierC();
                                     $test = rand(10,80);
                                     $Quantite = 1;
                                    $nomajouter = $_GET['nom'];
                                    if(isset($_GET['qte'])){
                                        $Quantite = $_GET['qte'];
                                    }
                                    try{
                                        $sql = "INSERT INTO panier VALUES (?,?,?)"; 
                                        $smt = $db->prepare($sql);
                                        $smt->bindValue(1,$test);
                                        $smt->bindValue(2,$nomajouter);
                                        $smt->bindValue(3,$Quantite);
                                        if($smt->execute()){
                                        }else{
                                        }
                                        }catch (Exception $e){
                                    }
                                   ?>
                                   <style type="text/css">

                                   </style>
                                   <?php
                                    $sql = "SELECT nom, id_pan as idp, quantite FROM panier";
                                    $smt = $db->prepare($sql);
                                    if($smt->execute()){
                                        
                                    }else{
                                    }
                                    if($smt->rowCount() > 0){
                                        $query = $smt->fetchAll();
                                        $x=0;
                                        foreach($query as $contentPan){
                                            $qteX = $contentPan['quantite'];
                                            $idpan = $contentPan['idp'];
                                            if(!$panierC->estCommande($idpan,/* $_SESSION["user"])*/"ons")){
                                                $sql = "SELECT nom_prod,prix_prod,photo_prod FROM produit WHERE nom_prod=?";
                                                $smt = $db->prepare($sql);
                                                $smt->bindValue(1,$contentPan[0]);
                                                
                                                $n=$contentPan[1];
                                                $qty=$contentPan[2];
                                                $nom=$contentPan[0];
                                                $smt->execute();
                                                
                                                if($smt->rowCount() > 0){
                                                    $content = $smt->fetch();

                                                    echo"
                                                            <tr>
                                                            <td class='cart-pic first-row'><img src='$content[2]' alt=''></td>
                                                            <td class='cart-title first-row'>
                                                                <h5>$content[0]</h5>
                                                            </td>
                                                            <td class='p-price first-row'>$content[1]</td>

                                                            
                                                            

                                                            <td class='qua-col first-row'>
                                                            <form method='POST' action='modifierPanier.php'>
                                                                <div class='quantity'>
                                                                    <div class='pro-qty'>
                                                                        <input type='text' name='qty' value='$qty'>

                                                                    </div>
                                                                </div>
                                                                "
                                                                ?>
                                                                <input type="hidden" value="<?php echo $nom;?>" name="nomProd">
                                                                <input type="hidden" value="<?php echo $idpan;?>" name="idPanier">
                                                                <input type="submit" value="🗘" id="<?php echo $idpan;?>" style="cursor:pointer">

                                                                <?php

                                                                $prixTotal=$content[1]*$qty;
                                                                $x++;
                                                                echo"
                                                            </form>
                                                            </td>
                                                            <td class='total-price first-row'>$prixTotal</td>
                                                            
                                                            <form method='POST' action='supprimerPanier.php' id='fsup"; echo $x;echo"'>
                                                                <input type='hidden' name='jk' value='$idpan'>
                                                                <td class='close-td first-row'><i class='ti-close' onclick='document.getElementById(\"fsup"; echo $x;echo"\").submit()'></i></td>
                                                            </form>

                                                            <td>
                                                                <form method='POST' action='ajouterCommande.php' id='ajoutc'>
                                                                        <input class='item_add hvr-skew-backward'  type='submit' name='commander' value='commander'>
                                                                        <input type='hidden' value='$idpan' name='idPanier'> "?> 
                                                                        <input type='hidden' value='<?php echo $content[1];?>' name='prix'> 
                                                                        <input type='hidden' value='<?php echo $content[0];?>' name='nomprod'>
                                                                        <input type='hidden' value='<?php echo $qteX;?>' name='qte'>
                                                                        <input type='hidden' value='<?php echo $_SESSION['client'];?>' name='nom'>
                                                                <?php
                                                                echo"
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                        }   
                                    }
                                ?>
                            </body>
                        </table>
                    </div>
                    <script type="text/javascript">
                        function updateSwitch(ref){
                            document.getElementById(ref).type = "submit";
                            document.getElementById(ref).className = "updateCart";
                            document.getElementById(ref).disabled = false;
                        }
                    </script>
                    <div class="row">
                        <div class="col-lg-4">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    

    <?php include_once "footer.php" ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>