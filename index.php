<?php

session_start();

//$_SESSION['foo'] = 'bar';
/*default_charset = "utf-8";*/

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);

include 'php/autoload.php';
$Template = new Template(new User());

include 'run.php';