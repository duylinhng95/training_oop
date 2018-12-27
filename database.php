<?php
class DB{
    private static $instance = null;
    public static function getInstance(){
        if (!isset(self::$instance)){
            try {
                self::$instance = new mysqli('127.0.0.1', 'root', '123456', 'training_oop');
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
}
?>