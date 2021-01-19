<!doctype html>
<head>
<link rel="stylesheet" href="assets/css/produit.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="assetes/css/tableutil.css">
<link rel="stylesheet" type="text/css" href="assets/css/tablemain.css">
<link rel="stylesheet" href="assets/css/produit.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
<?php include_once "bar.php";?>
  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
                <div style="display:table;width:50%;margin:0 auto">

                </div>
        








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






      </div>
    </div>
  </div>


    <div class="worktodo"></div>
  


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!--===============================================================================================-->  
    <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/table.js"></script>

    
</body>
</html>