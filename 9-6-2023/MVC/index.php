<?php  
include "core/db.php";
define('ROOT',substr($_SERVER['PHP_SELF'], 0, -9));
DB::createInstance();
DB::connect("localhost", "root", "", "2023_itec_blog");
var_dump(DB::getConn());

include 'controller/controller.php';
include 'controller/home.php';
include 'controller/user.php';

include 'core/router.php';
include 'core/web.php';


?>