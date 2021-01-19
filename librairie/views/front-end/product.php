<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
        $produit = $_GET['prod'];
        $cata = rawUrlDecode($_GET['cata']);
        echo "<title>$produit</title>";
    ?>
    

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

    <?php 
        include_once "bar.php";
        require_once "../../basepdo.php";
        
        $sql = "SELECT prix_prod,desc_prod,photo_prod,marque,stock FROM produit WHERE nom_prod = ? AND nom_cat = ?";
        $smt = $db->prepare($sql);
        $smt->bindValue(1,$produit);
        $smt->bindValue(2,$cata);
        $smt->execute();
        if($smt->rowCount() > 0){
            $content = $smt->fetch();
        }
    ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Acceuil</a>
                        <a href="shop.php?categorie=<?php echo rawUrlEncode($cata) ?>"><?php echo $cata ?></a>
                        <span><?php echo $produit ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container" style="display:table;margin:0 auto;">
            <div class="row">
                <div class="col-lg-9" style="display:table;margin:0 auto;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="<?php echo $content[2] ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="<?php echo $content[2] ?>"><img
                                            src="<?php echo $content[2] ?>" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $cata ?></span>
                                    <h3><?php echo $produit ?></h3>
                                    
                                    <?php
                                      if(strpos($_SESSION['favoris'],$produit)){
                                        echo"<div class='heart-icon icon' data-produit='$produit' data-verif=true>
                                             <i class='icon_heart' style='color:#ffaad4'></i>
                                         </div>";
                                     }else{
                                         echo"<div class='heart-icon icon' data-produit='$produit' data-verif=false>
                                             <i class='icon_heart_alt'></i>
                                         </div>";
                                     }
                                    ?>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p style="display: inline-block;"><?php echo number_format($content[0],3) ?></p><span>&nbsp;TD</span>
                                    <h4><?php echo $content[1] ?><!-- <span>629.99</span>--></h4>
                                </div>
                                <div class="quantity">
                                
                                    <div class="pro-qty">
                                        <form method="GET" action="../../views/front-end/shopping-cart.php" id="faj">
                                            <input type="text" value="1" name="qte">
                                            <input type="hidden" value="<?php echo $produit;?>" name="nom">
                                            <a href="#" class="primary-btn pd-cart" onclick="document.getElementById('faj').submit();">Acheter</a>
                                        </form>
                                    </div>
                               
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIE</span>: <?php echo $cata ?></li>
                                </ul>
                                <div class="pd-share">
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Avis Clients (02)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p><?php echo $content[1] ?></p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="<?php echo $content[2] ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Avis Clients</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Prix</td>
                                                <td>
                                                    <div class="p-price"><?php echo number_format($content[0],3) ?>DT</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Disponibilité</td>
                                                <td>
                                                    <div class="p-stock"><?php echo $content['stock'] ?> en stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Marque</td>
                                                <td>
                                                    <div class="p-stock"><?php echo $content['marque'] ?></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produits de la meme catégorie</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $sql = "SELECT nom_prod,prix_prod,photo_prod FROM produit WHERE nom_cat = ? ORDER BY RAND() LIMIT 4";
                    $smt = $db->prepare($sql);
                    $smt->bindValue(1,$cata);
                    $smt->execute();
                    if($smt->rowCount() > 0){
                        $query = $smt->fetchAll();
                        foreach($query as $content){
                            echo "
                                    <div class='col-lg-3 col-sm-6'>
                                    <div class='product-item'>
                                        <div class='pi-pic'>
                                            <img src='$content[2]' alt=''>";
                                            if(strpos($_SESSION['favoris'],$content[0])){
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
                                                <li class='quick-view'><a href='product.php?cata=".rawUrlEncode($cata)."&prod=$content[0]'>+ Détailles</a></li>
                                                <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class='pi-text'>
                                            <div class='catagory-name'>$cata</div>
                                            <a href='#'>
                                                <h5>$content[0]</h5>
                                            </a>
                                            <div class='product-price'>
                                            ".number_format($content[1],3)." DT
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                        
                    }
                ?>
                





            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    
    <?php include_once "footer.php" ?>
    <div id="lastwork"></div>
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
    </script>
</body>

</html>