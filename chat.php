<?php
session_start();
try{
	//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
die('Erreur : '.$e->getMessage());
  }

if(isset($_POST['logout'])){
  session_unset();
  session_destroy();
    header("Location:index.php");
}

include"conversation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <lin rel="stylesheet" type="text/css" href="chat.css">
  <title>MYCHAT</title>
</head>
<body>
<div class="chat">
  <div class="chat">
    <h1>BIENVENUE SUR MYCHAT !</h1>
  </div>
    <div class="message">
      <div class="envoi">
          <form method="post" action="chat.php">
            <input type="textarea" name="mesg" placeholder="Votre message..." value="" >
            <input type="submit" name="send" value="ENVOYER">
            <input type="submit" name="logout" value="LOGOUT">
      </div>
      
            <iframe id="conv" src="conversation.php" frameborder="1" width="900" height="600" scrolling="yes">

            <iframe>"

          </form>

      </div>
    </div>
  </div>
</body>
</html>
