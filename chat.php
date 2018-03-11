<?php
session_start();

if(isset($_POST['logout'])){
  session_unset();
  session_destroy();
  header('Location: index.php');
}

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
    <h1>BIENVENUE SUR MYCHAT <?$_SESSION['pseudo']?> !</h1>
  </div>
  <iframe id="conv" src="conversation.php" frameborder="1" width="900" height="600" scrolling="yes">   </iframe>
    <div class="message">
      <div class="send">
          <form method="post" action="chat.php">
            <input type="textarea" name="message" placeholder="Votre message...">
            <input type="submit" name="send" value="ENVOYER">
            <input type="submit" name="logout" value="LOGOUT">
          </form>

      </div>
    </div>
  </div>
</body>
</html>
