<?php
class config {
public static $instance = NULL;
    public static function getConnexion() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=clubEsprit', 'root', '');
        }
        return self::$instance;
    }
}
?>