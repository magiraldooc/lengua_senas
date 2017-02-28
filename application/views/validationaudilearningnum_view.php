<?php
$page = $_POST['page'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$cl1 = $_POST['correctLetra1'];
$cl2 = $_POST['correctLetra2'];
$cl3 = $_POST['correctLetra3'];


if ($option1 == $cl1 and $option2 == $cl2 and $option3 == $cl3) {
  header("Location: audilearningnum?id=941826&act=".$page."");
}
else{
  header("Location: audilearningnum?id=475869&act=".$page."");
}
?>