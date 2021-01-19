<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devenir un Client</title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>

    <?php include_once "bar.php"; ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i>Acceuil</a>
                        <span>Enregistrer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>INSCRIPTION</h2>
                        <form action="" METHOD="POST">
                            <div class="group-input">
                                <label for="username">Identifiant *</label>
                                <input type="text" name="client[]" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Nom *</label>
                                <input type="text" name="client[]" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Adresse E-mail *</label>
                                <input type="text" name="client[]" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Mot de Passe *</label>
                                <input type="password" name="client[]" required> 
                            </div>
                            <div class="group-input">
                                <label for="pass">Adresse livraison*</label>
                                <input type="text" name="client[]" required>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Numero de télèphone *</label>
                                <input type="text" name="client[]" required>
                            </div>
                            <button type="submit" class="site-btn register-btn" name="regbut">S'ENREGISTRER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Ou Connecter-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
    <?php
    if(isset($_POST['regbut'])){
        include_once "../../basepdo.php";
        include_once "../../core/client.php";
        $p = new Client;
        $client = $_POST["client"];
        $p->AjouterClient($client,$db);
    }
?>

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
    

</body>

</html>

