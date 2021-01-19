<?php
    $user = 'root';
    $pass = '';
    $ds = 'librairie';
    $db = new PDO("mysql:dbname=$ds;host=localhost",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
