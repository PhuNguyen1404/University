<?php
session_start();
if(!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}
define("ROOT", substr($_SERVER['PHP_SELF'], 0,-9));
include "core/DB.php";
DB::createInstance();
DB::connect("localhost", "root", "", "2023_itec_blog");
include "controllers/Controller.php";
include "controllers/HomeController.php";
include "controllers/UserController.php";
include "controllers/PostController.php";
include "models/Post.php";
include "models/User.php";
include "middleware/CSRF.php";
include "core/Router.php";
include "core/web.php";


?>

