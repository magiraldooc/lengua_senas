<?php
$page = $_POST['page'];
$c = $_POST['correct'];
$o = $_POST['nombre'];
$cl = $_POST['correctLetra'];

$correct = (int) $c;
$option = (int) $o;

if ($correct == $option) {

  header("Location: escribealf?id=941826&act=".$page."");
}
elseif ($cl == $o) {

  header("Location: escribealf?id=941826&act=".$page."");
}
else {
  header("Location: escribealf?id=475869&act=".$page."");
}
?>