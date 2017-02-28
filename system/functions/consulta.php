<?php
session_start();
$identificacion = $_SESSION['Identificacion'];
$id=$_GET["id"];
//Configuracion de la conexion a base de datos
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "lsc"; 

$dbr = mysqli_connect("localhost", "root", "", "lsc");


//consulta todos los empleados


$consulto_existencia = mysqli_query($dbr, "SELECT realizado from itemperformeduser where idItem = 1");
$realizado = mysqli_fetch_array($consulto_existencia);

if($realizado['realizado'] == '0'){ 
	$sql = mysqli_query($dbr, "UPDATE itemperformeduser set realizado = 1 where idItem = 1");
}
else{
	$sql = mysqli_query($dbr, "UPDATE itemperformeduser set realizado = 0 where idItem = 1");
}
//muestra los datos consultados

?>
