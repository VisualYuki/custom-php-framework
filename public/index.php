<?php
require "../vendors/core/Router.php";
require "../vendors/libs/functions.php";
require "../app/controllers/Main.php";
require "../app/controllers/Posts.php";


$query = trim($_SERVER["REQUEST_URI"], "/");

echo $query;
Router::add("^$", ["controller" => "Main", "action" => "index"]);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//debug(Router::getRoutes());

Router::dispatch($query);






