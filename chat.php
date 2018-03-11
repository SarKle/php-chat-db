<?php
try{
	//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
die('Erreur : '.$e->getMessage());
  }

  if(isset($_POST['send']) AND isset($_POST['mesg']) AND !empty($_POST['mesg'])){
    $message=htmlspecialchars($_POST['mesg']);
      $insertmess=$db->prepare('INSERT INTO messages (send)VALUES (?)');
        $insertmess->execute(array(
          $message
        ));
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
  <iframe id="conv" frameborder="1" width="900" height="600" scrolling="yes">
    <?php $allmsg=$db->query("SELECT * FROM messages ");
    while ($msg=$allmsg->fetch()) {
    }?>
    <?php echo $msg["pseudo"]?>: <?php echo $msg["mesg"] ?>
  </iframe>
    <div class="message">
      <div class="send">
          <form method="post" action="chat.php">
            <input type="textarea" name="mesg" placeholder="Votre message..." value="">
            <input type="submit" name="send" value="ENVOYER">

            <input type="submit" name="logout" value="LOGOUT">
          </form>

      </div>
    </div>
  </div>
</body>
</html>
