
<?php
    require_once "../../basepdo.php";
    session_start();
    $cata = $_POST['type'];
    $sql = "SELECT nom_prod,photo_prod,prix_prod FROM produit WHERE nom_cat=? ORDER BY rand() LIMIT 4";
    $smt = $db->prepare($sql);
    $smt->bindValue(1,$cata);
    $smt->execute();
    $total = $smt->fetchAll();
    foreach($total as $content){
        echo"
            <div class='product-item'>
                <div class='pi-pic'>
                    <img src='$content[1]' alt=''>";
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
                    ".number_format($content[2],3)."TD
                    </div>
                </div>
            </div>
        ";
     }
    
?>


