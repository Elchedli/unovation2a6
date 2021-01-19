<script src="js/bar.js"></script>    
<!-- Header Section Begin -->
<?php 
    error_reporting(0);
    ini_set('display_errors', 'Off');
    include_once "../../base.php";
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['client']);
        unset($_SESSION['favoris']);
    }
?>
<header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        LibrairieHemdeni@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +216 25 699 555
                    </div>
                </div>
                <div class="ht-right">
                <?php 
                    if(isset($_SESSION['client'])) echo "<a href='login.php?logout=1' class='login-panel'><i class='fa fa-user'></i>".$_SESSION['client']."</a>";
                    else echo "<a href='login.php' class='login-panel'><i class='fa fa-user'></i>Se Connecter</a>";
                ?>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo4.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 ml-0">
                        <div class="advanced-search">
                        <select  class="category-btn text-wrap" id="cat">
                            <?php
                                $sql ="SELECT nom_cat FROM categorie";
                                $result = mysqli_query($db,$sql);
                                $url = $_SERVER["REQUEST_URI"]; 
                                $pos = strrpos($url,"shop.php");
                                if($pos){
                                    $cata = rawUrlDecode($_GET['categorie']);
                                    if(isset($_GET['check'])){
                                        while($categorie = mysqli_fetch_assoc($result)){
                                            if($cata == $categorie['nom_cat']){
                                                echo "<option value='".$categorie['nom_cat']."'class ='text-wrap' selected>".$categorie['nom_cat']."</option>";
                                            }else{
                                                echo "<option value='".$categorie['nom_cat']."'class ='text-wrap'>".$categorie['nom_cat']."</option>";
                                            }   
                                        }
                                    }else{
                                        $cata = rawUrlDecode($_GET['categorie']);
                                        while($categorie = mysqli_fetch_assoc($result)){
                                            echo "<option value='".$categorie['nom_cat']."'class ='text-wrap'>".$categorie['nom_cat']."</option>";
                                        }
                                    }
                                }else{
                                    while($categorie = mysqli_fetch_assoc($result)){
                                        echo "<option value='".$categorie['nom_cat']."'class ='text-wrap'>".$categorie['nom_cat']."</option>";
                                    }
                                }
                                
                            ?>
                        </select>
                            <form onsubmit="return false" class="input-group" name="rech">
                                <input placeholder="Qu'est ce que vous avez besoin?" name="contenu">
                                <button type="button" id="recherche" name="recherche" onclick="sendserver()"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 text-right col-md-2">
                        <ul class="nav-right">
                            <li class="heart-icon heartcount"><a href="favoris.php">
                                    <i class="icon_heart_alt"></i>
                                    <span>
                                    <?php
                                     if(!empty($_SESSION['favoris'])){
                                         $favoris = explode("_",$_SESSION["favoris"],2);
                                         $favoris = explode("_",$favoris[1]);
                                         $blocks = count($favoris);
                                         echo $blocks;
                                     }else{
                                         echo '0';
                                         $blocks = 0;
                                         $favoris = NULL;
                                     } 
                                    ?></span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>
                                    <?php
                                     if(isset($_SESSION["shopping_cart"])){ 
                                        echo count($_SESSION["shopping_cart"]); 
                                     }else{
                                         echo '0';
                                     } 
                                    ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">0TND</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Produits</span>
                        <ul class="depart-hover">
                            <?php
                                $sql ="SELECT nom_cat FROM categorie";
                                $result = mysqli_query($db,$sql);
                                while($categorie = mysqli_fetch_assoc($result)){
                                    echo "<li><a href='./shop.php?categorie=".rawUrlEncode($categorie['nom_cat'])."'>".$categorie['nom_cat']."</a></li>";
                                }
                            ?> 
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Acceuil</a></li>
                        <li><a href="#">Nos Promotions</a>
                            <ul class="dropdown">
                            <?php
                                $date = date("Y-m-d");
                                $query = mysqli_query($db,"SELECT * FROM promotion WHERE is_active = 1 AND dat_promo > '$date'");
                                while($promotion = mysqli_fetch_assoc($query)){
                                    echo '<li><a href="promotion.php?id='.$promotion['id'].'">'.$promotion['name'].'</a></li>';
                                }
                            ?>
                            </ul>
                        </li>
                        <li><a href="./contact.php">Nous Contacter</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./shopping-cart.php">Panier</a></li>
                                <li><a href="./check-out.php">Payer vos commandes</a></li>
                                <li><a href="./register.php">Devenir un client</a></li>
                                <li><a href="./login.php">Connectez-vous</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <form action="shop.php" method="get" name="need">
        <input type="hidden" name="categorie">
        <input type="hidden" name="nom">
        <button type="hidden" value="submit" name="check" id="check" class="d-none"></button>
    </form>
    <!-- Header End -->