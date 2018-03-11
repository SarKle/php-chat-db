<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
die('Erreur : '.$e->getMessage());
}

if(isset($_POST['login']))
  if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
    $_POST['pseudo'] = filter_var($_POST['pseudo'],FILTER_SANITIZE_STRING);
    $_POST['password'] = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $pseudo = ($_POST['pseudo']);
    $password = ($_POST['password']);
    $result = $db->prepare('SELECT * FROM users WHERE pseudo = ? AND password = ?');
    $result->execute(array($pseudo, $password));
    $user = $result->fetchAll(PDO::FETCH_ASSOC);
      if(count($user) == 1){
        $_SESSION['id'] = $info[0]['id'];
        $_SESSION['pseudo'] = $info[0]['pseudo'];
        $_SESSION['password'] = $info[0]['password'];
      }
      else{
        $error="Vous n'êtes pas inscrit sur le chat! Cliquez sur INSCRIPTION.";
          echo($error);
          echo "<br>";
          echo($password);
      }
  }
  if(isset($_POST['logout'])){
  //  $_POST['pseudo'] = filter_var($_POST['pseudo'],FILTER_SANITIZE_STRING);
    //$_POST['password'] = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
      session_unset();
      session_destroy();
      header('Location: index.php');
  }

  global $db;
    if(isset($_POST['send']) && isset($_POST['message']) && !empty($_SESSION['pseudo'])){
      $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
      $req = $db->prepare('INSERT INTO messages (id, send) VALUE (?,?)');
      $user2 = $_SESSION['id'];
      $req->execute(array($user2, $_POST['message']));
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<title>ACCUEIL MYCHAT</title>
</head>
<body>
  <form method="post" action="index.php">
    <div class="register">
      <?php if(empty($_SESSION['pseudo'])): ?>
        <input type="text" name="pseudo" placeholder="PSEUDO">
        <input type="password" name="password" placeholder="PASSWORD">
        <input type="submit" name="login" value="LOGIN">
          <?php else : ?>
            <input type="submit" name="logout" value="LOGOUT">
      <?php endif; ?>
    </div>
  </form>
  <div class="register2">
    <?php if(empty($_SESSION['pseudo'])): ?>
      <a href="register.php"><button>INSCRIPTION</button></a>
    <?php endif; ?>
  </div>
  <div class="chat">
    <div class="chat-title">
      <h1>BIENVENUE SUR MYCHAT!</h1>
    </div>
    <iframe src="conversation.php" frameborder="1" width="900" height="600"></iframe>
      <div class="message">
        <div class="send">
          <?php if(!empty($_SESSION['pseudo'])): ?>
            <form class="send" method="post" action="index.php">
              <input class="textarea" type="text" name="message" placeholder="Ecrivez votre message">
              <input class="button" type="submit" name="send" value="ENVOYER">
            </form>
            <?php else : ?>
              <input class="textarea" type="text" name="message" placeholder=" Ecrivez votre message" disabled>
              <input class="button" type="submit" name="send" value="ENVOYER" disabled>
          <?php endif; ?>
        </div>
      </div>
    </div>
      <?php if(isset($error)) {
        echo $error;
      }?>
    </body>
</html>
