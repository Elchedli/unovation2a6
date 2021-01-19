<!doctype html>
<head>
</head>
<?php
    if(isset($_POST["submit"])){
        $name = $_POST["nom"];
        var_dump($name);
        session_start();
        var_dump($_SESSION['user']);
    }else{
        $test = "lol";
        session_start();
        $_SESSION['user'] = "nour";
?>
<div class="all">
    <form action="test.php" name="test" method="POST">
        <div class="textbox">
            <input type="text" placeholder="nom" id="nom" name="nom">
        </div>
        <div class="textbox">
            <input type="text" placeholder="prix" id="prix" name="prix">
        </div>
        <div class="textbox">
            <input type="text" placeholder="photo" id="photo" name="photo">
        </div>
        <div class="textbox">
            <input type="text" placeholder="description" id="description" name="description">
        </div>
        <div class="textbox">
            <input type="text" placeholder="stock" id="stock" name="stock">
        </div>
        <button id="submit" name="submit">Submit</button>
    </form>
</div>
<?php } ?>
