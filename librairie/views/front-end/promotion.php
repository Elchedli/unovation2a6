<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hamdeni Promotions</title>

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
        error_reporting(-1);
        include_once "bar.php"; 
        if(isset($_GET['id'])){
			$currentId = intval($_GET['id']);
			$query = mysqli_query($db, "SELECT * FROM promotion WHERE id = $currentId");
			if(mysqli_num_rows($query) > 0){
				$currentPromotion = mysqli_fetch_assoc($query);
			}else{
				echo '<meta http-equiv="refresh" content="0; URL=index.php">';
				exit;
			}
		}else{
			echo '<meta http-equiv="refresh" content="0; URL=index.php">';
			exit;
		}
    ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Acceuil</a>
                        <a href=""> Promotion </a>
                        <span><?php echo $currentPromotion['name']; ?></span>
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
                
                <div class="col-lg-12 order-1">
                    <div class="product-show-option">
						<div class="row">
                            <div class="col-lg-7 col-md-7">
                               <h2 style="text-transform: capitalize;"><?php echo $currentPromotion['name']; ?></h2>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right nbprod">
                                <p id="compteur">Cette promotion expire le <?php echo $currentPromotion['dat_promo']; ?></p>
                            </div>
                        </div>
						<div class="row">
							<div class="col-lg-12 mb-5 mt-5">
								<img src="../../uploads/<?php echo $currentPromotion['img_promo']; ?>" width="100%" />
							</div>
						</div>
                        <div class="row">
							<div class="col-lg-12">
								<p style="line-height:26px;"><?php echo $currentPromotion['description']; ?></p>
							</div>
						</div>
                    </div>
                    
                    <div class="product-list">
                        <div class="row rowanda">
                        <?php 
                            include_once "../../entities/singlePromotion.php";
                        ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <?php include_once "footer.php" ?>

    <!-- Js Plugins -->
    <div id="lastwork"><?php // echo var_dump($_SESSION['favoris']) ?></div>
    
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

</body>
</html>