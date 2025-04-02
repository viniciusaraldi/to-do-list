<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/vendor/autoload.php";
require_once __DIR__. "/controller/controller.php";

$c = new Controller();
echo $c->Action(parse_url($_SERVER['REQUEST_URI']));