<?php
	$sql = "SELECT * from produit WHERE promotion_id = $currentId";
    $query = mysqli_query($db,$sql);
    $i = 0;
	
    while($produit = mysqli_fetch_assoc($query)){
        $i++;
		$currentPrice = $produit['prix_prod'] * (100 - $currentPromotion['Perc_promo']) / 100;
        ?>
        <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo $produit['photo_prod'] ?>" alt="">
                                <div class="sale pp-sale">Vente</div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="<?php echo "product.php?cata=".rawUrlEncode($produit['nom_cat'])."&prod=".$produit['nom_prod'];?>">+ Détailles</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $produit['nom_cat'] ?></div>
                                <a href="#">
                                    <h5><?php echo $produit['nom_prod'] ?></h5>
                                </a>
                                <div class="product-price">
								
                                    <?php echo number_format($currentPrice,3) ?> DT
                                    <!-- Promotion bar -->
                                    <span><?php echo number_format($produit['prix_prod'],3) ?> DT</span>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
    }
mysqli_close($db);
?>

          