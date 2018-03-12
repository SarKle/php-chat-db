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
if(isset($_POST['login']) AND !empty($_POST["pseudo"]) AND !empty($_POST["password"])){
   $pseudo=htmlspecialchars($_POST['pseudo']);
   $password=htmlspecialchars($_POST['password']);
   $recup_user=$db->prepare('SELECT * FROM users WHERE pseudo=? AND password=? ');
    $recup_user->execute(array($pseudo,$password));
//si une ligne retournée
   if($recup_user->rowcount()==1){
    $info_user=$recup_user->fetch();
      echo $info_user;
      $_SESSION['pseudo']=$info_user['pseudo'];
      $_SESSION['id']=$info_user['id'];
      $_SESSION['password']=$info_user['password'];

      header("Location:chat.php");
 }
   else{
     echo "VEUILLEZ VOUS INSCRIRE";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="index.css">
<title>SE CONNECTER MYCHAT</title>
</head>
<body>
  <?php var_dump($_SESSION); ?>
  <h1>SE CONNECTER AU CHAT</h1>
  <form method="post" action="index.php">
    <div class="register">
      PSEUDO:<input type="text" name="pseudo" placeholder="PSEUDO"><br>
      MOT DE PASSE:<input type="password" name="password" placeholder="PASSWORD"><br>
      <input type="submit" name="login" value="LOGIN">
    </div>
  </form>
    <div class="clicnew">
      <a href="register.php"><button>NOUVEAU MEMBRE</button></a>
    </div>
    </body>
</html>
