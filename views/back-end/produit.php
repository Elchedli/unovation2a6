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
                    <select class="custom-select mr-sm-2" id="type" style="width:220px;position:relative;bottom:10px">
                        <option value='nom_prod'>Nom</option>
                        <option value='prix_prod'>Prix</option>
                        <option value='stock'>Stock</option>
                        <option value='marque'>Marque</option>
                    </select>
                    <div class="inputbox" style="display:inline-block">
                        <input type='text' name="recherche" autocomplete="off" required>
                        <label for="nom" class="label-name">
                            <span class="content-name"></span>
                        </label>
                    </div>
                </div>
                <select class="custom-select mr-sm-2" id="cat" style="width:300px;position:relative;bottom:10px">
                    <?php
                       
                       $sql = "SELECT nom_cat FROM categorie";
                       $smt = $db->prepare($sql);
                        $smt->execute();
                        if($smt->rowCount() > 0){
                            $content = $smt->fetch();
                            echo "<option value='$content[0]'>$content[0]</option>";
                            $cata = $content[0];
                            $total = $smt->fetchAll();
                            foreach($total as $content){
                                echo "<option value='$content[0]'>$content[0]</option>";
                            }
                        }
                    ?>
                    </select>
                    <button type="button" class="btn btn-warning" id="ajouter" style="float:right;margin-bottom:20px">Ajouter</button>
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Nom</th>
								<th class="column2">Prix</th>
								<th class="column3">Image</th>
								<th class="column4">Stock</th>
								<th class="column5">Type</th>
                                <th class="column6">Marque</th>
                                <th class="column7">Description</th>
                                <th class="column8">Supprimer</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                                $sql = "SELECT nom_prod,prix_prod,photo_prod,stock,type_prod,marque,desc_prod FROM produit WHERE nom_cat = ? LIMIT 15";
                                $smt = $db->prepare($sql);
                                $smt->bindValue(1,$cata);
                                $smt->execute();
                                $total = $smt->fetchAll();
                                
                                foreach($total as $content){
                                    echo "<tr data-nom='$content[0]'>
                                        <td class='column1' data-type='nom_prod'><p>$content[0]</p></td>
                                        <td class='column2' data-type='prix_prod'><p>$content[1]</p></td>
                                        <td class='column3' data-type='photo_prod'><p>$content[2]</p></td>
                                        <td class='column4' data-type='stock'><p>$content[3]</p></td>
                                        <td class='column5' data-type='type_prod'><p>$content[4]</p></td>
                                        <td class='column6' data-type='marque'><p>$content[5]</p></td>
                                        <td class='column7' data-type='desc_prod'><p>$content[6]</p></td>
                                        <td class='column8' data-name='$content[0]'><i class='fa fa-times'></i></td>
                                    </tr>";
                                }
                            ?>
						</tbody>
					</table>
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
        var categorie = $("#cat").val(),type = $("#type").val(),ca=null,bartxt=null;
        
                
        
        $("#cat").change(function(){
            categorie = $(this).val();
        });
        $("#type").change(function(){
            type = $(this).val();
        });
        $('input[name ="recherche"]').keyup(function(e){
                  nameu = $(this).val();
                  $("tbody").load("../../entities/chedli/CRUDproduit.php",{
                    cata: categorie,
                    name: nameu,
                    type: type,
                    choix: 0
                  });
        });
        

        $('td').on('click', function(){
            ca = $(this);
            bartxt = $('<input>', {
                id: "change",
                class: "form-control",
                onblur: "magic()",
                value: ca.text(),
                type: 'text'
            }).appendTo(ca.empty()).focus();
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
        $('.column8').on('click',function() {
            nom = $(this).data("name");
            $(".worktodo").load("../../entities/chedli/CRUDproduit.php",{
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
     
        $('#ajouter').click(function(){
            var html = "<tr><td class='column1'><input class='form-control' type='text' id='nom'></td><td class='column2'><input class='form-control' type='text' id='prix'></td><td class='column3'><input class='form-control' type='text' id='image'></td><td class='column4'><input class='form-control' type='text' id='stock'></td><td class='column5'><input class='form-control' type='text' id='typeprod'></td><td class='column6'><input class='form-control' type='text' id='marque'></td><td class='column7'><input class='form-control' type='text' id='desc'></td><td class='column8' id='add'><i class='fa fa-plus-circle'></i></td></tr>";
            $('tbody').append(html);
        });

       
    </script>
    
</body>
</html>