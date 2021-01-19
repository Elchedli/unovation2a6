<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hamdeni Produits</title>

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
    <link rel="stylesheet" href="css/shop.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>
    
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <?php 
        //error_reporting(0);
        //ini_set('display_errors', 0);
        include_once "bar.php";
    ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i>Acceuil</a>
                        <span>Favoris</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2" style="flex: 0 0 100%;max-width:100%">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                <form method="GET" action="" id="hideafter">
                                        <select class="sorting" name="sorting" onchange="chan()">
                                            <option value="produit.aleatoire">Aléatoire</option>
                                            <option value="produit.prix.croissant">Prix Croissant</option>
                                            <option value="produit.prix.decroissant">Prix Decroissant</option>
                                            <option value="produit.nom.croissant">Nom, A a Z</option>
                                            <option value="produit.prix.decroissant">Nom, Z a A</option>
                                        </select>
                                </form>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right nbprod">
                                <label>Il y a </label>
                                <label id="compteur"><?php echo $blocks ?></label>
                                <label> Produits</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-list">
                        <div class="row rowanda">
                            <?php 
                                require_once "../../entities/chedli/favorispage.php";
                            ?>
                        </div>
                    </div>
                    <?php
                      if($i > 20) echo '<div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
                      else echo '<div class="lds-grid" style="display:none"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
    <div id="lastwork" style="height: 46px;"></div>
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
    <script>
        $(".icon").click(function(){
                    verse = $(this).data("verif");
                    prod = $(this).data("produit");
                    $(this).data("verif",!verse);
                    if(verse){
                        $(this).html("<i class='icon_heart_alt'></i>");
                        $("#lastwork").load("../../entities/chedli/chargerfavoris2.php",{
                            prod: prod
                        });
                        heart = $('.heartcount span');
                        ca = $(this).parent().parent().parent().remove();
                        tot = Number(heart.text())-1;
                        tot = tot.toString();
                        heart.text(tot);
                        heart = $('#compteur');
                        tot = Number(heart.text())-1;
                        tot = tot.toString();
                        heart.text(tot);
                    }
        });
    </script>
</body>
</html>