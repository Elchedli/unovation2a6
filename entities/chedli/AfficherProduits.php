<?php
    $request = "SELECT favoris from client WHERE pseudo_client='".$_SESSION['client']."'";
    $result = mysqli_query($db,$request);
    $favoris = mysqli_fetch_row($result);
    $favoris = $favoris[0];
    $result = mysqli_query($db,$sql);
    $i = 0;
    if(mysqli_num_rows($result) == 0){
        echo "<p id='aucun' style='margin:auto auto;'>Il n'ya aucun produit,Veuillez Voir par catégorie.</p>";
        echo "<script>$('#allfilter').hide();$('.sorting').hide();$('#pasproduitcenter').css({'display':'table','margin':'0 auto'});</script>";
    }else{
        
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
<!-- ************************************** -->
                                        <li class="w-icon active"><a href="shopping-cart.php?nom=<?PHP echo $produit['nom_prod'];?>"><i class="icon_bag_alt"></i></a></li>
<!-- *************************************-->
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
        ?>
        <script>
        $(window).scroll(function(){
                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    size+=21;
                    request = window.location.href;
                    request = request.replace("views/front-end/shop.php","entities/chedli/showmore.php");
                    $(".rowanda").load(request,{
                        size: size
                    },function(){
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
        </script>
        <?php
    }
mysqli_close($db);
?>
          