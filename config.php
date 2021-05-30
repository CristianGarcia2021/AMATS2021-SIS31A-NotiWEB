<?php

$username = "root";
    $password = "sqlserver20@";
    $server = "localhost";
    $con = mysqli_connect($server, $username, $password) or die("Error al conectar a la base de datos".mysql_error());

	$db = "redsocial";
	if(!$connec){
		echo "No se ha conectado a la base de datos";
	}
	else{
		$select = mysql_select_db ($db);
	}
?>