<!doctype html>
<head>
<link rel="stylesheet" href="assets/css/produit.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<?php include_once "bar.php";?>
<?php
include_once "../../basepdo.php";
include_once "../../core/promotion.php";
$promotion = new Promotion;
$alert = null;
$success = null;
$id = intval($_GET['id']);
$single = $promotion->fetchById($db,$id);
if($single == false){
	echo '<meta http-equiv="refresh" content="0; URL=listing_promotion.php">';
	exit;
}
if(isset($_POST['update_promo'])){
	$promotion_tmp = array(
		'name' => $_POST['name'],
		'description' => $_POST['description'],
		'expiration' => $_POST['expiration'],
		'is_active' => $_POST['is_active'],
		'pourcentage' => $_POST['pourcentage']
	);
	if(file_exists($_FILES['picture']['tmp_name']) || is_uploaded_file($_FILES['picture']['tmp_name'])){
		$picture = $_FILES['picture'];
		include_once "../../entities/upload_picture.php";
		if(($picture_name = upload_picture($picture)) == null){
			$alert = "L'image entrée est invalide";
		}else{
			$promotion_tmp['picture'] = $picture_name;
		}
	}
	$update = $promotion->updatePromotion($db, $promotion_tmp, $id);
	if($update == true) {
		$success = "Votre promotion a été modifiée avec succès.";
	}else{
		$alert = "Un erreur s'est produit, veuillez ressayer ultérierement.";
	}
}
?>
<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
						<?php 
						if($alert !== null) {
						?>
							<div class="alert alert-danger" role="alert">
								<?php echo $alert; ?>
							</div>
						<?php
						}elseif( $success !== null) {
						?>
							<div class="alert alert-success" role="alert">
								<?php echo $success; ?>
								<meta http-equiv='refresh' content='2'>
								<?php exit; ?>
							</div>
						<?php
						}
						?>
						<div class="card">
                            <div class="card-header">
                                <strong class="card-title">Editer une Promotion</strong>
								<a href="listing_promotion.php" class="btn btn-primary" style="float: right;"><i class="fa fa-list"></i> Liste des promotions</a>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nom de la promotion</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Promotion Eté 2109" value="<?php echo $single['name']; ?>" class="form-control" required><small class="form-text text-muted">Nom de la promotion</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="pourcentage" class=" form-control-label">Pourcentage</label></div>
                                        <div class="col-12 col-md-9">
											<div class="input-group">
												<input type="text" id="pourcentage" name="pourcentage" value="<?php echo $single['Perc_promo']; ?>"  placeholder="15" class="form-control" required><div class="input-group-addon">%</div>
											</div>
											<small class="text-muted form-text">Pourcentage</small>
										</div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="pourcentage" class=" form-control-label">Date d'expiration</label></div>
                                        <div class="col-12 col-md-9">
											<input class="form-control" type="date" value="<?php echo $single['dat_promo']; ?>" name="expiration" id="expiration">
										</div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description"  id="description" rows="9" placeholder="Description" class="form-control" required><?php echo $single['description']; ?></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label">
                                                        <input type="radio" name="is_active" value="true" class="form-check-input" <?php if($single['is_active'] == 1){ echo 'checked'; } ?>>Active
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" name="is_active" value="false" class="form-check-input"<?php if($single['is_active'] == 0){ echo 'checked'; } ?>>Non Active
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="picture" class=" form-control-label">Image Associée</label></div>
                                        <div class="col-12 col-md-9">
											<img src="../../uploads/<?php echo $single['img_promo']; ?>" />
											<input type="file" id="picture" name="picture" class="form-control-file">
										</div>
                                    </div>
									<div class="form-actions form-group">
										<button type="submit" name="update_promo" class="btn btn-success btn-sm">Editer</button>
										<button type="reset" class="btn btn-sm">Réinisialiser</button>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<!--
    <!--  Chart js --
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart--
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
-->
    <!--Local Stuff-->
