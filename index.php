<?php
ini_set("display_errors",0);error_reporting(0);

try{
	//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
die('Erreur : '.$e->getMessage());
  }

$pseudo=$_POST["pseudo"];
  $pseudosanit=filter_var($pseudo, FILTER_SANITIZE_STRING);

$mail=$_POST["email"];
  $mailsanit=filter_var($mail, FILTER_VALIDATE_EMAIL);

$password=$_POST["password"];
  $passwordsanit=filter_var($password, FILTER_SANITIZE_STRING);

//envoi formulaire d'inscription vers mysql
if(isset($_POST["pseudo"]) && isset(($_POST["email"])) && isset(($_POST["password"])) && isset($_POST["submit"])){
  $req = $db->prepare('INSERT INTO users (pseudo, mail, password) VALUES (:pseudosanit,:mailsanit, :passwordsanit)');
  $req->execute(array(
      'pseudosanit' => $pseudosanit,
      'mailsanit' => $mailsanit,
      'passwordsanit' => $passwordsanit
  ));
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SACHAT</title>
</head>
<body>

<h1>SACHAT</h1>

<h3>INSCRIPTION</h3>
  <form action="conversation.php" method="post">
    <label for "pseudo"> PSEUDO: </label> <input type="text" name="pseudo"/>
    <label for "email"> E-MAIL: </label> <input type="email" name="email"/>
    <label for "password"> PASSWORD: </label> <input type="password" name="password"/>
    <input type="submit" name="submit" value="submit">
  </form>

<h3>SE CONNECTER</h3>
  <form action="conversation.php" method="post">
    <label for "pseudoco"> PSEUDO: </label> <input type="text" name="pseudoco"/>
    <label for "passwordco"> PASSWORD: </label> <input type="password" name="passwordco"/>
    <input type="submit" name="connexion" value="connexion">
  </form>


</body>
</html>
