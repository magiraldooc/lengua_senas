<?php
$page = $_POST['page'];

$valor = $_POST['CorrectOption'];
$c = $_POST['correct'];
$cl = $_POST['correctLetra'];


if($valor==$c or $valor==$cl){
  header("Location: eligealf?id=941826&act=".$page."");

}else{
  header("Location: eligealf?id=475869&act=".$page."");

}

?>
