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

        include_once "bar.php"; 
        $sql ="SELECT nom_prod,prix_prod,photo_prod,desc_prod,nom_cat FROM produit";
        if (isset($_GET['check'])){
            $nomm = $_GET['nom'];
            if($cata == "defaut"){
                $sql.=" WHERE nom_prod LIKE '%$nomm%'";
            }else{
                $sql.=" WHERE nom_prod LIKE '%$nomm%' AND nom_cat = '$cata'";
            }
        }else{
            $sql.=" WHERE nom_cat = '$cata'";
        }
        if(isset($_GET['prix'])){
            $prix = explode('-',$_GET['prix']);
            $sql.=" AND prix_prod BETWEEN $prix[0] AND $prix[1]";
        }
        if(isset($_GET['sort'])){
            $choice = $_GET['sort'];
            $sql.=" ORDER BY ";
            switch($choice){
                case "produit.aleatoire":
                    $sql.="RAND()";
                break;
                case "produit.prix.croissant":
                    $sql.="prix_prod ASC";
                break;
                case "produit.prix.decroissant":
                    $sql.="prix_prod DESC";
                break;
                case "produit.nom.croissant":
                    $sql.="nom_prod ASC";
                break;
                case "produit.prix.decroissant":
                    $sql.="nom_prod DESC";
                break;
            }
        }
        $request = explode(" ",$sql,3);
        $request = "SELECT Count(*) $request[2]";
        $result = mysqli_query($db,$request);
        $value = mysqli_fetch_row($result);
        $sql.=" LIMIT 21";
            //$sql ="SELECT nom_prod,prix_prod,photo_prod,desc_prod,produit.nom_cat,desc_cat FROM produit INNER JOIN categorie ON produit.nom_cat = categorie.nom_cat ORDER BY prix_prod LIMIT 21";
    ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Acceuil</a>
                        <a href=""> Magasin </a>
                        <span><?php echo $cata ?></span>
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
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter" id="allfilter">
                <?php 
                include_once "../../entities/chedli/affichercatetmarques.php";
                ?>
                    <div class="filter-widget">
                        <h4 class="fw-title">prix</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="239">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default cercleprix" onmouseup="changeprix()"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default cercleprix" onmouseup="changeprix()"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2" id="pasproduitcenter">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                <form method="GET" action="">
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
                                <p id="compteur">Il y a <?php echo $value[0]; ?> Produits</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-list">
                        <div class="row rowanda">
                        <?php 
                            include_once "../../entities/chedli/AfficherProduits.php";
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
    <div id="lastwork" style="height: 20px;"></div>
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
    <script async>
        var smack,push,nbprod,size = 21,boxes,catblock="",marblock="";
        $(".catblock").change(function(){
            size=21;
            request = window.location.href;
            request = request.replace("&catblock="+catblock,"");
            window.history.pushState("wak", 'bonjour', request);
            boxes = $('.catblock:checked');
            if(boxes.length){
                catblock="";
                boxes.each(function(){
                    catblock+=$(this).data("name")+"_";
                });
                catblock = catblock.slice(0,-1);
                catblock = encodeURIComponent(catblock);
                request+="&catblock="+catblock;
                window.history.pushState("wak", 'bonjour', request);
                //alert(catblock);
                request = request.replace("views/front-end/shop.php","entities/chedli/ShopDisplay.php");
            }else{
                request = request.replace("views/front-end/shop.php","entities/chedli/ShopDisplay.php");
            }
            $(".rowanda").load(request,function(){
                $(".icon").click(function(){
                    verse = $(this).data("verif");
                    prod = $(this).data("produit");
                    heart = $('.heartcount span');
                    $(this).data("verif",!verse);
                    if(!verse){
                        $(this).html("<i class='icon_heart' style='color:#ffaad4'></i>");
                        tot = Number(heart.text())+1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 1,
                            prod: prod
                        });
                    }else{
                        $(this).html("<i class='icon_heart_alt'></i>");
                        tot = Number(heart.text())-1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 0,
                            prod: prod
                        });
                        
                    }
                    
                });
            });
        });
        $(".marblock").change(function(){
            size=21;
            request = window.location.href;
            request = request.replace("&marblock="+marblock,"");
            window.history.pushState("wak", 'bonjour', request);
            boxes = $('.marblock:checked');
            if(boxes.length){
                marblock="";
                boxes.each(function(){
                    marblock+=$(this).data("name")+"_";
                });
                marblock = marblock.slice(0,-1);
                marblock = encodeURIComponent(marblock);
                request+="&marblock="+marblock;
                window.history.pushState("wak", 'bonjour', request);
                //alert(catblock);
                request = request.replace("views/front-end/shop.php","entities/chedli/ShopDisplay.php");
            }else{
                request = request.replace("views/front-end/shop.php","entities/chedli/ShopDisplay.php");
            }
            $(".rowanda").load(request,function(){
                $(".icon").click(function(){
                    verse = $(this).data("verif");
                    prod = $(this).data("produit");
                    heart = $('.heartcount span');
                    $(this).data("verif",!verse);
                    if(!verse){
                        $(this).html("<i class='icon_heart' style='color:#ffaad4'></i>");
                        tot = Number(heart.text())+1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 1,
                            prod: prod
                        });
                    }else{
                        $(this).html("<i class='icon_heart_alt'></i>");
                        tot = Number(heart.text())-1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 0,
                            prod: prod
                        });
                        
                    }
                    
                });
            });
            
        });
        function chan(){
            size=21;
            request = window.location.href;
            if(request.indexOf('sort') !== -1){
                request = request.replace("&sort="+smack,"");
            }
            smack = $(".sorting").val();
            request+="&sort="+smack;
            window.history.pushState({push}, 'bonjour', request);
            request = request.replace("views/front-end/shop.php","entities/chedli/ShopDisplay.php");
            $(".rowanda").load(request,function(){
                $(".icon").click(function(){
                    verse = $(this).data("verif");
                    prod = $(this).data("produit");
                    heart = $('.heartcount span');
                    $(this).data("verif",!verse);
                    if(!verse){
                        $(this).html("<i class='icon_heart' style='color:#ffaad4'></i>");
                        tot = Number(heart.text())+1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 1,
                            prod: prod
                        });
                    }else{
                        $(this).html("<i class='icon_heart_alt'></i>");
                        tot = Number(heart.text())-1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 0,
                            prod: prod
                        });
                        
                    }
                    
                });
            });
        }
        
        function changeprix(){
            size=21;
            scrollaccess = false;
            request = window.location.href;
            if(request.indexOf('&prix=') !== -1){
                request = request.replace("&prix="+push,"");
            }
            push = $('#minamount').val()+"-"+$('#maxamount').val();
            request+="&prix="+push;
            window.history.pushState({push}, 'bonjour', request);
            request = request.replace("views/front-end/shop.php","entities/chedli/ShopDisplay.php");
            $(".rowanda").load(request,function(){
                $(".icon").click(function(){
                    verse = $(this).data("verif");
                    prod = $(this).data("produit");
                    heart = $('.heartcount span');
                    $(this).data("verif",!verse);
                    if(!verse){
                        $(this).html("<i class='icon_heart' style='color:#ffaad4'></i>");
                        tot = Number(heart.text())+1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 1,
                            prod: prod
                        });
                    }else{
                        $(this).html("<i class='icon_heart_alt'></i>");
                        tot = Number(heart.text())-1;
                        tot = tot.toString();
                        heart.text(tot);
                        $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                            choix: 0,
                            prod: prod
                        });
                        
                    }
                    
                });
            });
            /*,{
                
            });*/

           // window.location.href=request;
        }
        

        
        $(".icon").click(function(){
                verse = $(this).data("verif");
                prod = $(this).data("produit");
                
                heart = $('.heartcount span');
                $(this).data("verif",!verse);
                if(!verse){
                    $(this).html("<i class='icon_heart' style='color:#ffaad4'></i>");
                    tot = Number(heart.text())+1;
                    tot = tot.toString();
                    heart.text(tot);
                    $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                        choix: 1,
                        prod: prod
                    });
                }else{
                    $(this).html("<i class='icon_heart_alt'></i>");
                    tot = Number(heart.text())-1;
                    tot = tot.toString();
                    heart.text(tot);
                    $("#lastwork").load("../../entities/chedli/chargerfavoris.php",{
                        choix: 0,
                        prod: prod
                    });
                    
                }
                
            });
    </script>
</body>
</html>