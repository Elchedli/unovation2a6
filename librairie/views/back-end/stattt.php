

<?php
require_once "../../basepdo.php";
?>
<div id="snackbar">Statistiques</div>
<div align="center">
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "librairie");  
 $query = "SELECT pseudo_client, count(*) as number FROM commande GROUP BY pseudo_client";  
 $result = mysqli_query($connect, $query);  
 ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Client', 'Distribution'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                              
                               echo "['".$row["pseudo_client"]."', ".$row["number"]."],";  
                          }  
                          ?>  
        ]);

        var options = {
          title: "Statistiques de distributions des commandes"
        };

        var chart = new google.visualization.PieChart(document.getElementById('column'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="column" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<!-- /. PAGE INNER  -->
            </div>
            


            <body id="reportsPage">
            <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="backindex.php">
                   <!-- <h1 class="tm-site-title mb-0">Control panel admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--navigation bar, must be the same on all pages, starts from here -->
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">