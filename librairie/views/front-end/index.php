<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librairie Hemdeni</title>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php 
        include_once "bar.php"; 
        require_once "../../basepdo.php";
    ?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/cahier.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Cahiers,Spirale</span>
                            <h1>Promotion</h1>
                            <p>La meilleure qualité de spirale avec un design classique.</p>
                            <a href="#" class="primary-btn">Acheter</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Vente <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/stylo.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Stylo,Personnalisé</span>
                            <h1>Promotion</h1>
                            <p>Une collection de stylos pour vos besoins quotidiennes</p>
                            <a href="#" class="primary-btn">Acheter</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Vente <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="http://bon-plan-au-quotidien.com/wp-content/uploads/2019/07/téléchargement-2-696x392.jpg" alt="">
                        <div class="inner-text" onclick="location.href='shop.php?categorie=Adhésifs%2C%20Agrafage%20%26%20Découpe';" style="cursor:pointer;">
                            <h4>Adhésifs</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="https://ds1.static.rtbf.be/article/image/370x208/7/3/0/32bfa03ca4305453ac94a9039ea1bdb9-1378457340.jpg" alt="">
                        <div class="inner-text" onclick="location.href='shop.php?categorie=Cahiers%2C%20blocs%20et%20feuilles';" style="cursor:pointer;">
                            <h4>Cahiers</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="https://fac.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2FFAC.2Fvar.2Ffemmeactuelle.2Fstorage.2Fimages.2Factu.2Fvie-pratique.2Ffournitures-scolaires-nouveautes-rentree-2017-2018-42378.2F14656302-2-fre-FR.2Ffournitures-scolaires-les-nouveautes-de-la-rentree-2017-2018.2Ejpg/850x478/quality/90/crop-from/center/fournitures-scolaires-les-nouveautes-de-la-rentree-2017-2018.jpeg" alt="">
                        <div class="inner-text" onclick="location.href='shop.php?categorie=Accessoires%20de%20bureau';" style="cursor:pointer;">
                            <h4>Accessoires</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="https://www.numerama.com/content/uploads/2019/08/fournitures-scolaires-ecole-environnement-rentree-1024x576.jpg">
                        <h2>Basiques</h2>
                        <a href="shop.php?categorie=Adhésifs%2C%20Agrafage%20%26%20Découpe">Voir plus</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control first">
                        <ul data-choix="true">
                            <li data-type="Adhésifs, Agrafage & Découpe" class="active">Adhésifs</li>
                            <li data-type="Papier">Papiers</li>
                            <li data-type="Cahiers, blocs et feuilles">Cahiers</li>
                            <li data-type="Ecriture & Correction">Ecriture</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                          $sql = "SELECT favoris from client WHERE pseudo_client='".$_SESSION['client']."'";
                          $smt = $db->prepare($sql);
                          $smt->execute();
                          $favoris = $smt->fetch();
                          $favoris = $favoris[0];
                          $sql = "SELECT nom_prod,photo_prod,prix_prod FROM produit WHERE nom_cat='Adhésifs, Agrafage & Découpe' ORDER BY rand() LIMIT 4";
                          $smt = $db->prepare($sql);
                          $smt->execute();
                          $total = $smt->fetchAll();
                          foreach($total as $content){
                            echo"
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='$content[1]' alt=''>";
                                        if(strpos($favoris,$content[0])){
                                            echo"<div class='icon' data-produit='$content[0]' data-verif=true>
                                            <i class='icon_heart' style='color:#ffaad4'></i>
                                            </div>";
                                        }else{
                                            echo"<div class='icon' data-produit='$content[0]' data-verif=false>
                                                <i class='icon_heart_alt'></i>
                                            </div>";
                                        }
                                        echo"<ul>
                                            <li class='w-icon active'><a href='#'><i class='icon_bag_alt'></i></a></li>
                                            <li class='quick-view'><a href='product.php?cata=".rawUrlEncode('Adhésifs, Agrafage & Découpe')."&prod=$content[0]'>+ Détailles</a></li>
                                            <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>Adhésifs, Agrafage & Découpe</div>
                                        <a href='#'>
                                            <h5>$content[0]</h5>
                                        </a>
                                        <div class='product-price'>
                                        ".number_format($content[2],3)."TD
                                        </div>
                                    </div>
                                </div>";
                         }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control second">
                        <ul  data-choix="false">
                            <li data-type="Classement & Archivage" class="active">Classement</li>
                            <li data-type="Tableaux">Tableaux</li>
                            <li data-type="Calculatrices">Calculatrices</li>
                            <li data-type="Accessoires de bureau">Accessoires</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel version">
                    <?php
                          $sql = "SELECT nom_prod,photo_prod,prix_prod FROM produit WHERE nom_cat='Classement & Archivage' ORDER BY rand() LIMIT 4";
                          $smt = $db->prepare($sql);
                          $smt->execute();
                          $total = $smt->fetchAll();
                          foreach($total as $content){
                            echo"
                                <div class='product-item'>
                                    <div class='pi-pic'>
                                        <img src='$content[1]' alt=''>";
                                        if(strpos($favoris,$content[0])){
                                            echo"<div class='icon' data-produit='$content[0]' data-verif=true>
                                            <i class='icon_heart' style='color:#ffaad4'></i>
                                            </div>";
                                        }else{
                                            echo"<div class='icon' data-produit='$content[0]' data-verif=false>
                                                <i class='icon_heart_alt'></i>
                                            </div>";
                                        }
                                        echo"<ul>
                                            <li class='w-icon active'><a href='#'><i class='icon_bag_alt'></i></a></li>
                                            <li class='quick-view'><a href='product.php?cata=".rawUrlEncode('Classement & Archivage')."&prod=$content[0]'>+ Détailles</a></li>
                                            <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='pi-text'>
                                        <div class='catagory-name'>Adhésifs, Agrafage & Découpe</div>
                                        <a href='#'>
                                            <h5>$content[0]</h5>
                                        </a>
                                        <div class='product-price'>
                                        ".number_format($content[2],3)."TD
                                        </div>
                                    </div>
                                </div>
                            ";
                         }
                        ?>  
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="https://resize.prod.femina.ladmedia.fr/rblr/652,438/img/var/2019-08/budget-prix-fournitures-scolaire-achat.jpg">
                        <h2>Divers</h2>
                        <a href="shop.php?categorie=Classement%20%26%20Archivage">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <div id="lastwork"></div>

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


    $('.filter-control li').click(function(){
        if(!($(this).hasClass('active'))){
            ca = $(this).parent('ul').find(".active");
            ca.attr('class','');
            $(this).attr('class','active');
            type = $(this).data('type');
            ca =  $(this).parent().parent().parent().find('.product-slider');
            ca.load("../../entities/chedli/indexchangeprod.php",{
                type: type
            },function(){
                ca.data('owl.carousel').destroy();
                $(".product-slider").owlCarousel({ 
                    loop: true,
                    margin: 25,
                    nav: true,
                    items: 4,
                    dots: true,
                    navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                    smartSpeed: 1200,
                    autoHeight: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 2,
                        },
                        992: {
                            items: 2,
                        },
                        1200: {
                            items: 3,
                        }
                    }
                });
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
        
    });

    /*if(phase){
                var dataList = $(".first li").map(function() {
                    return $(this).data("type");
                }).get();
            }else{
                var dataList = $(".second li").map(function() {
                    return $(this).data("type");
                }).get();
            }*/
        /*
            ca = $(this).closest('ul');
            phase = ca.data('choix');
        }*/
    </script>
</body>

</html>