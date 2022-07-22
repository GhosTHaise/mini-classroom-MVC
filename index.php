<?php
session_start(); 
define('URL',str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));
//echo "hello <br>";
//var_dump(explode('/',filter_var($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])));
//echo "<br>";
require_once("Controllers/Router.php");
$router = new Router();
$router->routereq();
?>