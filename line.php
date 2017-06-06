<?php

include('LineClass.php');
//Get code
$code = ($_GET['code']);
$client_id = '1518779687';
$client_secret = 'b19ca25337e491af5102e65315e624ca';

//Initiate Class
$lineClass = new LineClass;

$lineClass->lineAuth($code,$client_id,$client_secret);


?>
