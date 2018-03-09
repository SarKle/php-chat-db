<?php
session_start();
include"dbh.php";

$pseudo=$_POST["pseudo"];
$password=$_POST["password"];

$sql=('SELECT * FROM users WHERE pseudo="'.$pseudo.'" AND password="'.$password.'"');
  $result=$bd->query($sql);

if(!$row=$result->fetch_assoc()){
  header("Location:error.php");
}
else{

  $_SESSION["name"]=$_POST["pseudo"];
  
  header("Location:home.php");
}

?>
