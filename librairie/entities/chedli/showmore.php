<?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    include_once "../../base.php";
    $sql ="SELECT nom_prod,prix_prod,marque,type_prod,photo_prod,desc_prod,nom_cat FROM produit";
    $cata = $_GET['categorie'];
    $size = $_POST['size'];
    if (isset($_GET['check'])){
        $nomm = $_GET['nom'];
        if($cata == "catégories"){
            $request = "SELECT COUNT(*) FROM produit WHERE nom_prod LIKE '%$nomm%'";
            $result = mysqli_query($db,$request);
            $value = mysqli_fetch_row($result);
            $sql.=" WHERE nom_prod LIKE '%$nomm%'";
        }else{
            $request = "SELECT COUNT(*) FROM produit WHERE nom_prod LIKE '%$nomm%' AND nom_cat = '$cata'";
            $result = mysqli_query($db,$request) or die("Bad Create : $request");
            $value = mysqli_fetch_row($result);
            $sql.=" WHERE nom_prod LIKE '%$nomm%' AND nom_cat = '$cata'";
        }
    }else{
        $request = "SELECT COUNT(*) FROM produit WHERE nom_cat= '$cata'";
        $result = mysqli_query($db,$request);
        $value = mysqli_fetch_row($result);
        $sql.=" WHERE nom_cat = '$cata'";
    }
    if(isset($_GET['prix'])){
        $prix = explode('-',$_GET['prix']);
        $sql.=" AND prix_prod BETWEEN $prix[0] AND $prix[1]";
    }
    if(isset($_GET['catblock'])){
        $prix = rawurldecode($_GET['catblock']);
        $prix = explode('_',$prix);
        $sql.=" AND type_prod = '$prix[0]'";
        unset($prix[0]);
        foreach ($prix as $element){
            $sql.=" OR type_prod = '$element'";
        }
    }

    if(isset($_GET['marblock'])){
        $prix = rawurldecode($_GET['marblock']);
        $prix = explode('_',$prix);
        $sql.=" AND marque = '$prix[0]'";
        unset($prix[0]);
        foreach ($prix as $element){
            $sql.=" OR marque = '$element'";
        }
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
    $request = "SELECT favoris from client WHERE pseudo_client='".$_SESSION['client']."'";
    $result = mysqli_query($db,$request);
    $favoris = mysqli_fetch_row($result);
    $favoris = $favoris[0];
    $request = explode(" ",$sql,3);
    $request = "SELECT Count(*) $request[2]";
    $result = mysqli_query($db,$request);
    $value = mysqli_fetch_row($result);
    echo 
    "<script>
        $('#compteur').text('Il y a $value[0] Produits');
    </script>";
    $sql.=" LIMIT $size";
    $result = mysqli_query($db,$sql);
    $i = 0;
    while($produit = mysqli_fetch_assoc($result)){
        $i++;
    ?>
        <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo $produit['photo_prod'] ?>" alt="">
                                <div class="sale pp-sale">Vente</div>
                                <?php
                                    if(strpos($favoris,$produit['nom_prod'])){
                                       echo"<div class='icon' data-produit='".$produit['nom_prod']."' data-verif=true>
                                            <i class='icon_heart' style='color:#ffaad4'></i>
                                        </div>";
                                    }else{
                                        echo"<div class='icon' data-produit='".$produit['nom_prod']."' data-verif=false>
                                            <i class='icon_heart_alt'></i>
                                        </div>";
                                    }
                                ?>
                                <ul>
                                
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="<?php echo "product.php?cata=".rawUrlEncode($cata)."&prod=".$produit['nom_prod'];?>">+ Détailles</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $produit['nom_cat'] ?></div>
                                <a href="#">
                                    <h5><?php echo $produit['nom_prod'] ?></h5>
                                </a>
                                <div class="product-price">
                                    <?php echo number_format($produit['prix_prod'],3) ?>&nbsp;DT
                                    <!-- Promotion bar -->
                                    <!--  <span>$35.00</span> -->
                                </div>
                            </div>
            </div>
        </div>
        
    <?php
        }
    if($i % $size != 0){
        echo '<script>$(".lds-grid").css("display","none");</script>';
    }else{
        echo '<script>$(".lds-grid").css("display","table");</script>';
    }
    mysqli_close($db);
?>
          