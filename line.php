<?php

include('LineClass.php');
//Get code
$code = ($_GET['code']);
$client_id = '1518772834';
$client_secret = '02cfdcfbbe67ee26c69fca2966679b9b';

//Initiate Class
$lineClass = new LineClass;

$lineClass->lineAuth($code,$client_id,$client_secret);


?>
