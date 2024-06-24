<?php 

class Home {
    public static $title;

    public static function outputTitle() { 
        echo "<h1>".self::$title."</h1>";
    }

    public static function setTitle($title) { 
        self::$title = $title;
    }
}