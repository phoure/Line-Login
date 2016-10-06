<?php

include('LineClass.php');
//Get code
$code = ($_GET['code']);
$client_id = '1481604842';
$client_secret = 'a7b27636f1be60fcc0e12f08f996a01b';

//Initiate Class
$lineClass = new LineClass;

$lineClass->lineAuth($code,$client_id,$client_secret);


?>
