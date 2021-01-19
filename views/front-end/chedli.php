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
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include_once "bar.php"; ?>

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
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
<?PHP
include ($_SERVER["DOCUMENT_ROOT"] . '/librairie/core/PanierC.php');
//if (isset($_GET['IdProduit']))
//{
//$img=$panier1C->recupererimage($_GET['IdProduit']);

$panier1C=new PanierC();
$listePaniers=$panier1C->afficherPaniers();

//var_dump($listeEmployes->fetchAll());
if (isset($_POST['chercher']))
{
  $listePaniers=$panier1C->chercherPaniers($_POST["search"]);
}
?>
<form method="POST" >
 <input type="text" placeholder="Id Panier à chercher" name="search" id="IdPanier">

    <input type="submit" name="chercher" value="chercher">

</form>
<!--<caption>Afficher les Paniers</caption>
 <a href="tri.php" >Trier</a>

<table border="1">
<tr>
<td>Id Panier</td>
<td>Quantite</td>
<td>Id Produit </td>
<td>Nom Produit </td>
<td>Prix Unitaire  Produit</td>

</tr>
-->
<?PHP
foreach($listePaniers as $row){
    ?>
    <!--<tr>
    <td><?PHP //echo $row['IdPanier']; ?></td>
    <td><?PHP //echo $row['Quantite']; ?></td>
    <td><?PHP //echo $row['IdProduit']; ?></td>
    <td><?PHP //echo $row['NomProduit']; ?></td>
    <td><?PHP //echo $row['PrixProduit']; ?></td>
    <td><form method="POST" action="comande.php">
    <input type="submit" name="commander" value="commander">

    <input type="hidden" value="<?PHP //echo $row['IdPanier']; ?>" name="IdPanier">
    </form>


    <form method="POST" action="supprimerPanier.php">
    <input type="submit" name="supprimer" value="supprimer">

    <input type="hidden" value="<?PHP //echo $row['IdPanier']; ?>" name="IdPanier">
    </form> 
    </td>
    
    <td><a href="modifierPanier.php?IdPanier=<?PHP //echo $row['IdPanier']; ?>">
    Modifier</a></td>
    <td><a href="product.html?IdPanier=<?PHP //echo $row['IdPanier']; ?>">
    Ajouter</a></td>
        
    </tr>-->

<div class="check-out">
<div class="container">
    
    <div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive">
            <table class="table-heading simpleCart_shelfItem">
          <tr>
            <th class="table-grid">Article: <?PHP  echo $row['IdProduit']; ?> </th>
                    
            <th>Prix unitaire</th>
            <th >Quantite </th>
          </tr>
          <tr class="cart-header">

            <td class="ring-in"><a href="single.html" class="at-in"><img src="../assets/images/<?php echo $row['Image'] ;?>"style="width: 200px"></a>
            <div class="sed">
                <h5><a href="single.html"><?PHP  echo $row['NomProduit']; ?></a></h5>

            </div>
            <div class="clearfix"> </div>
                    

            <td><?PHP  echo $row['PrixProduit']; ?></td>
            <td>
            
                            
        
                            <!--quantity-->

        <form  method="POST" action="comande.php">
            <input type="number" min="0" name="quantite" value="<?php echo $row['Quantite'];?>">
            <!--<input type="hidden" value="<?PHP //echo $_POST['Quantite']; ?>" name="Quantite">-->
            <input class="item_add hvr-skew-backward"  type="submit" name="commander" value="commander">
            <input type="hidden" value="<?PHP echo $row['IdPanier']; ?>" name="IdPanier">
        </form>
            </td>
            
            <td class="item_price">
                <form method="POST" class="" action="supprimerPanier.php">
    <input type="submit" name="supprimer" class="item_add hvr-skew-backward" value="supprimer">

    <input type="hidden" value="<?PHP echo $row['IdPanier']; ?>" name="IdPanier">
    </form></td>
            <td class="add-check">

    <!--<form method="POST" action="comande.php">
    <input class="item_add hvr-skew-backward"  type="submit" name="commander" value="commander">

    <input type="hidden" value="<?PHP// echo $row['IdPanier']; ?>" name="IdPanier">

    </form>-->
    </form>

                </td>
        
          </tr>
         
          
    
</div>
</div>
    <?PHP
}
//}
?>
</table>
<script>
    $('.value-plus').on('click', function(){
        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
        divUpd.text(newVal);
    });

    $('.value-minus').on('click', function(){
        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
        if(newVal>=1) divUpd.text(newVal);
    });
    </script>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>$240.00</span></li>
                                    <li class="cart-total">Total <span>$240.00</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
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