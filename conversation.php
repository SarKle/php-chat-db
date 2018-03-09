<?php
session_start();
include "dbh.php";
$msg=$_POST["msg"];
$pseudo=$_SESSION["pseudo"];

$sql=('INSERT INTO messages(send,pseudo) VALUES ("'.$msg.'","'.$pseudo.'")');
  $result=$bd->query($sql);

header('Location:home.php');
?>
