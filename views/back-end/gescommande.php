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
                    <div class="inputbox" style="display:inline-block">
                        <input type='text' name="recherche" autocomplete="off" required>
                        <label for="nom" class="label-name">
                            <span class="content-name"></span>
                        </label>
                    </div>
                </div>
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Commande</th>
								<th class="column2">Id panier</th>
								<th class="column3">Utilisateur</th>
                                <th class="column4">Supprimer</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                                $sql = "SELECT * FROM commande LIMIT 40";
                                $smt = $db->prepare($sql);
                                $smt->execute();
                                $total = $smt->fetchAll();
                                foreach($total as $content){
                                    echo "<tr data-nom='$content[0]'>
                                        <td class='column1' data-type='nom_prod'><p>$content[0]</p></td>
                                        <td class='column2' data-type='prix_prod'><p>$content[1]</p></td>
                                        <td class='column3' data-type='photo_prod'><p>$content[2]</p></td>
                                        <td class='column4' data-name='$content[0]'><i class='fa fa-times'></i></td>
                                    </tr>";
                                }
                            ?>
						</tbody>
					</table>
                    <a
              href="stats.php"
              class="btn btn-primary btn-block text-uppercase mb-3">statistiques</a>

				</div>
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
    <script>
        var type = $("#type").val(),ca=null,bartxt=null;
        $('input[name ="recherche"]').keyup(function(e){
                  nameu = $(this).val();
                  $("tbody").load("../../entities/ons/CRUDcommande.php",{
                    name: nameu,
                    choix: 0
                  });
        });
        
        function magic(){
            ca = $("#change");
            valeur = ca.val();
            tous = "<p>"+valeur+"</p>";
            var produit = [ca.parent('td').data("type"),valeur,ca.closest('tr').data("nom")];
            ca.replaceWith(tous);
            $('.worktodo').load("../../entities/chedli/CRUDproduit.php",{
                choix: 3,
                produit:produit
            });
        }
        $('.column4').on('click',function() {
            nom = $(this).data("name");
            $(".worktodo").load("../../entities/ons/CRUDcommande.php",{
                choix: 1,
                name: nom
            });
            $(this).parent('tr').remove();
        });


        $('body').delegate('#add','click',function() {
            var produit = [$("#nom").val(), $("#prix").val(), $("#image").val(), $("#stock").val(),$("#typeprod").val(),$("#marque").val(),$("#desc").val(),$("#cat").val()];
            $('.worktodo').load("../../entities/chedli/CRUDproduit.php",{
                choix: 2,
                produit:produit
            });
            $('#add').parent('tr').remove();
        });

       
    </script>
    
</body>
</html>