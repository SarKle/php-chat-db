<?php
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
if(isset($_POST["submit"])){
  if(isset($_POST["pseudo"],$_POST["email"],$_POST["password"])){
    if(!empty($_POST['email']) AND !empty($_POST["pseudo"]) AND !empty($_POST['password'])){
        $pseudo =htmlspecialchars ($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
          $_POST['pseudo'] = filter_var($_POST['pseudo'],FILTER_SANITIZE_STRING);
          $_POST['password'] = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
          $_POST['email'] = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        $newuser=$db->prepare("INSERT INTO users (pseudo,email,password) VALUES (?,?,?)");
          $newuser->execute(array(
            $pseudo,$email,$password
          ));
          header("Location:index.php");
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="register.css"/>
<title>INSCRIPTION</title>
</head>
<body>
  <section class="form">
    <h1>NOUVEL UTILISATEUR</h1>
      <div class="enregistrer">
        <form method="post" action="register.php">
          <div class="email">
            EMAIL:
                <input type="text" name="email" placeholder="Insérez votre adresse email" required>
          </div>
          <div class="pseudo">
            PSEUDO:
              <input type="text" name="pseudo" placeholder="Choisissez un nom d'utilisateur">
          </div>
          <div class="password">
            PASSWORD:
              <input type="password" name="password" placeholder="Choisissez un mot de passe"></br>
          </div>

      </div>
      <div class="send">
        <input type="submit" name="submit" value="ENREGISTRER"> 
      </div>
        </form>
        <?php if(isset($_GET['error'])){echo $_GET['error'];} ?>
  </section>
</body>
</html>
