<?php
header('Access-Control-Allow-Origin: *');

//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

/*$server   = '178.128.146.252';
$user     = 'admin_sigmauser';
$password = 'pfaDKIJyPF';
$db       = 'admin_sigmatest';
$xConexion = mysqli_connect($server, $user, $password, $db);
mysqli_query($xConexion, "SET NAMES 'utf8'");
date_default_timezone_set('America/New_York');*/

$xConexion = @mysqli_connect ('localhost', 'root', '', 'test');
if (!$xConexion) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
}else{
	//echo 'Exito';
}


