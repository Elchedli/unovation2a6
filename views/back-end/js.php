<!doctype html>
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"> </script>

</head>
<?php
    if(isset($_POST["submit"])){
        $name = $_POST["nom"];
        print_r($name);
    }else{

?>
<script>
$(document).ready(function(){
    $('#test').on('submit', function () {
        alert('Form submitted!');
        return true;
    });
});
</script>
<div class="all">
    <form id="test" name="test" method="POST">
        <div class="textbox">
            <input type="text" placeholder="nom" id="nomss" name="nom[]">
        </div>
        <div class="textbox">
            <input type="text" placeholder="prix" id="prix" name="nom[]">
        </div>
        <div class="textbox">
            <input type="text" placeholder="photo" id="photo" name="nom[]">
        </div>
        <div class="textbox">
            <input type="text" placeholder="description" id="description" name="nom[]">
        </div>
        <div class="textbox">
            <input type="text" placeholder="stock" id="stock" name="nom[]">
        </div>
        <button value="submit" name="submit"></button>
    </form>
    
</div>
<?php } ?>
