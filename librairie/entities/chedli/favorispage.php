<?php

    $i=0;
    if(isset($favoris[0])){
        foreach($favoris as $element){
            $i++;
            $request = 'SELECT nom_prod,nom_cat,photo_prod,prix_prod from produit WHERE nom_prod="'.$element.'"';
            $result = mysqli_query($db,$request);
                while($produit = mysqli_fetch_row($result)){
                    ?>
                    <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="<?php echo $produit[2] ?>" alt="">
                                            <div class="sale pp-sale">Vente</div>
                                            <div class='icon' data-produit="<?php echo $produit[0] ?>" data-verif=true>
                                                <i class='icon_heart' style='color:#ffaad4'></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="<?php echo "product.php?cata=".rawUrlEncode($produit[1])."&prod=$produit[0]";?>">+ Détailles</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name"><?php echo $produit[1]; ?></div>
                                            <a href="#">
                                                <h5><?php echo $produit[0] ?></h5>
                                            </a>
                                            <div class="product-price">
                                                <?php echo number_format($produit[3],3) ?>&nbsp;DT
                                                <!-- Promotion bar -->
                                                <!--  <span>$35.00</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    }
            }
    }else{
        echo "<p style='margin:auto auto'>Vous n'avez pas de favoris.</p><script>$('#hideafter').hide();</script>";
    }
    
mysqli_close($db);
?>



          