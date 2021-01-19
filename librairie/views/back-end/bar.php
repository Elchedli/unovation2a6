<?php 
session_start();
$link = $_SESSION["user"]; 
?>   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Librairie ElHamdeni-Gestion</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>


<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="acceuil.php"><i class="menu-icon fa fa-home"></i>Acceuil</a>
                    </li>
                    <li>
                        <a href="informations.php"> <i class="menu-icon fa fa-info-circle"></i>Informations</a>
                    </li>
                    <li class="menu-title">Produits</li><!-- /.menu-title -->
                    <li><a href="produit.php"> <i class="menu-icon fa  fa-plus"></i>Ajouter P.D</a></li>
                    <li><a href="categorie.php"> <i class="menu-icon fa  fa-shopping-cart"></i>Categorie</a></li>
                    <li class="menu-title">Réclamation</li><!-- /.menu-title -->
                    <li><a href="AfficherReclamation.php"> <i class="menu-icon fas fa-edit"></i>Gestion Réclamation</a></li>
                    <li class="menu-title">Livraison</li><!-- /.menu-title -->
                    <li><a href="livreur.php"> <i class="menu-icon fas fa-people-carry"></i>Livreur</a></li>
                    <li><a href="livraison.php"> <i class="menu-icon fas fa-truck"></i>Livraison</a></li>
                    <li><a href="statistique.php"> <i class="menu-icon fa fa-pie-chart"></i>Statistique</a></li>
                    <li><a href="map.php"> <i class="menu-icon fas fa-location-arrow"></i>Point de livraison</a></li>
                    <li class="menu-title">Promotions</li><!-- /.menu-title -->
                    <li><a href="listing_promotion.php"> <i class="menu-icon fa fa-fire"></i>Liste des Promotions</a></li>
                        <li><a href="new_promotion.php"> <i class="menu-icon fa fa-plus-square"></i>Nouvelle Promotion</a></li>
                    <li class="menu-title">Commandes</li><!-- /.menu-title -->
                    <li><a href="gescommande.php"> <i class="menu-icon fa  fa-plus"></i>Gestion Commandes</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo4.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">
                                    <?php
                                      require_once "../../basepdo.php";
                                      $sql = "SELECT mess FROM notif ORDER BY id desc LIMIT 5";
                                      $smt = $db->prepare($sql);
                                      $smt->execute();
                                      $total = $smt->fetchAll();
                                      echo count($total);
                                    ?>
                                </span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red"></p>
                               
                                    <?php
                                      foreach($total as $content){
                                        echo "<a class='dropdown-item media' href='#'><i class='fa fa-check'></i>
                                        <p>$content[0]</p></a>";
                                      }
                                    ?>
                                   
                                
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">1</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">Vous avez 1 mail</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Ranim Dwess</span>
                                        <span class="time float-right">1Mois avant</span>
                                        <p>Réclamation de produit.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/users/<?php echo($link); ?>.jpg">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications<span class="count">1</span></a>

                            <a class="nav-link" href="index.php"><i class="fa fa-power -off"></i>Deconnexion</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

