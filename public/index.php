<?php
//print_r($_SERVER);
$query =  rtrim($_SERVER["REQUEST_URI"], "/");

require "../vendors/core/Router.php";
require "../vendors/libs/functions.php";

Router::add("^s", ["controller" => "Main", "action" => "index"]);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//debug(Router::getRoutes());

Router::dispatch($query);

//if(Router::matchRoute($query)) {
//    debug(Router::getRoute());
//}
//else {
//    echo "404";
//}





