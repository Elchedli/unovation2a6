
<div class="filter-widget">
<?php
            $catreq = "SELECT type_cat FROM categorie WHERE nom_cat='$cata'";
            $result = mysqli_query($db,$catreq);
            $types = mysqli_fetch_assoc($result);
            if(isset($types['type_cat'])){
                $types = explode(",",$types['type_cat']);
                ?>
                    
                    <h4 class="fw-title">Catégories</h4>
                <?php
            foreach ($types as $element){
?>
    <div class="fw-brand-check">
        <div class="bc-item">
            <label for="bc-<?php echo $element; ?>">
            <?php echo $element; ?>
            <input type="checkbox" class="catblock" name="catblock" data-name="<?php echo $element; ?>" id="bc-<?php echo $element; ?>">
            <span class="checkmark"></span>
            </label>
        </div>
    </div>                          
<?php }}
$catreq ="SELECT marque FROM produit WHERE nom_cat = '$cata'";
$result = mysqli_query($db,$catreq);
while($produit = mysqli_fetch_assoc($result)){
    if(!isset($mar[$produit['marque']])){
        $mar[$produit['marque']] = 0;
    }
    $mar[$produit['marque']]++;
}

echo "</div>";
if(isset($mar)){
?>
<div class="filter-widget">
    <h4 class="fw-title">Marques</h4>
    <?php 
        foreach ($mar as $k => $v){
    ?>
            <div class="fw-brand-check">
                    <div class="bc-item">
                        <label for="bc-<?php echo $k; ?>">
                        <?php echo "$k  ($v)";  ?>
                        <input type="checkbox" class="marblock" name="marblock" data-name="<?php echo $k; ?>" id="bc-<?php echo $k; ?>">
                        <span class="checkmark"></span>
                        </label>
                    </div>
            </div>
    <?php }
echo "</div>";
} 
?>
