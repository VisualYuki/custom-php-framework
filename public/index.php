<?php
//print_r($_SERVER);
echo $_SERVER["REQUEST_URI"];

require "../vendors/core/Router.php";

$router = new Router();
