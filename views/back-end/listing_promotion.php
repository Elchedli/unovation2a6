<!doctype html>
<head>
<link rel="stylesheet" href="assets/css/produit.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php include_once "bar.php";?>
<?php
include_once "../../basepdo.php";
include_once "../../core/promotion.php";
$promotion = new Promotion;
/*
if(isset($_POST["ajouter"])){
    $produit = $_POST["produit"];
    $p->AjouterProduit($produit,$db);
}
if(isset($_POST["modifier"])){
    $produit = $_POST["produit"];
    $p->ModifierProduit($produit,$db);
}
if(isset($_POST["supprimer"])){
    $produit = $_POST["produit"];
    $p->SupprimerProduit($produit,$db);
}*/
$alert = "";
if(isset($_POST['deleteProm'])){
	$id = intval($_POST['promo_id_to_delete']);
	if($promotion->deletePromo($db, $id) == true){
		echo("<meta http-equiv='refresh' content='0'>");
	}else{
		$alert = "Un erreur c'est produit lors de la suppression de la promotion. Veuillez ressayer plus tard.";
	}
}

$promo_listing = $promotion->listAll($db);

?>
<div class="content">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<?php if($alert !== ""){ ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $alert; ?>
					</div>
				<?php } ?>
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Liste des promotions</strong>
						<a href="new_promotion.php" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Nouvelle promotion</a>
					</div>
					<div class="table-stats order-table ov-h">
						<table class="table">
							<thead>
								<tr>
									<th>Image</th>
									<th>ID</th>
									<th>Titre</th>
									<th>Date d'expiration</th>
									<th>Pourcentage</th>
									<th style="text-align:center;">Status</th>
									<th style="text-align: center;">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($promo_listing as $row){ ?>
								<tr>
									<td>
										<div>
											<a href="#"><img style="max-width: 200px;" src="../../uploads/<?php echo $row['img_promo']; ?>" alt=""></a>
										</div>
									</td>
									<td> #<?php echo $row['id']; ?> </td>
									<td>  <span class="name"><?php echo $row['name']; ?></span> </td>
									<td><span><?php echo $row['dat_promo']; ?></span></td>
									<td><span class="pourcentage"><?php echo $row['Perc_promo']; ?>%</span></td>
									<td style="text-align:center;">
										<?php
											if(($row['dat_promo']) < (date("Y-m-d"))){
												echo '<span class="badge badge-warning">Expirée</span>';
											}elseif($row['is_active'] == 0){
												echo '<span class="badge badge-danger">Non-active</span>';
											}else{
												echo '<span class="badge badge-complete">Active</span>';
											}
										?>
									</td>
									<td style="text-align:center;">
										<a href="update_promotion.php?id=<?php echo $row['id']; ?>" class="action-btn"><i class="fa fa-pencil"></i></a>
										<a href="" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-title="<?php echo $row['name']; ?>" data-target="#deleteModal" class="delete-btn"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div> <!-- /.table-stats -->
				</div>
			</div>
		</div>
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteModalLabel">Avertissement de suppression</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>
							Veuillez confirmer la suppression de la promotion "<span class="promo-title"></span>". Tous les produits associés à cette promotion seront rétablis à leurs prix intiales.
						</p>
					</div>
					<div class="modal-footer">
					<form method="POST">
						<input type="hidden" name="promo_id_to_delete" id="promo_id_to_delete" value="" />
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
						<button type="submit" name="deleteProm" class="btn btn-danger" style="width: fit-content;">Confirmer</button>
					</form>
					</div>
				</div>
			</div>
		</div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

<script type="text/javascript">
$(document).on("click", ".delete-btn", function() {
	 var promoId = $(this).data('id');
	 var title = $(this).data('title');
	 $("#promo_id_to_delete").val(promoId);
	 $(".promo-title").empty();
	 $(".promo-title").append(title);
	 console.log(title);
	 // As pointed out in comments, 
	 // it is unnecessary to have to manually call the modal.
	 // $('#addBookDialog').modal('show');
});
</script>