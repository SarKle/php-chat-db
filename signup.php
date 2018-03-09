<?php
include"dbh.php";

$pseu=$_POST["pseudo"];
  $pseudo=filter_var($pseu,FILTER_SANITIZE_STRING);
    trim($pseudo);

$ema=$_POST["email"];
  $email=filter_var($ema,FILTER_SANITIZE_EMAIL);
    trim($email);

$pass=$_POST["password"];
  $password=filter_var($pass,FILTER_SANITIZE_STRING);
    trim($password);


$sql=prepare("INSERT INTO users (pseudo,email,password) VALUES ('$pseudo','$email','$password')");
  $result=$bd->execute($sql);

header("Location: index.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>signup</title>
</head>
<body>

  </body>
  </html>
