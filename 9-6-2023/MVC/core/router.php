<?php 

class Routter {
    //static properties
    public static $route;
    public static $url;
    public static $found = false;
    public static $params;
    public static $validRoute = [];

    //method
    public static function get($route, $function) {
        self::$route = $route;
        self::$validRoute[] = self::$route;
        if(!isset($_GET['url'])) {
            self::$url = '';
        } else { 
            self::$url = $_GET['url'];
        }

        //self::getParam();

        if(self::$route == self::$url && $_SERVER['REQUEST_METHOD'] == 'GET') { 
            self::$found = true;
            $function->__invoke(/*$params*/);
        }

    }
    
    public static function post($route, $function) {
        self::$route = $route;
        self::$validRoute[] = self::$route;
        if(!isset($_GET['url'])) {
            self::$url = '';
        } else { 
            self::$url = $_GET['url'];
        }

        if(self::$route == self::$url && $_SERVER['REQUEST_METHOD'] == 'POST') { 
            self::$found = true;
            $function->__invoke(/*$params*/);
        }
    }
    
}