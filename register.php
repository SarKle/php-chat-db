<?php
$pseudo = ($_POST['pseudo']);
$email = ($_POST['email']);
$password = ($_POST['password']);
  $_POST['pseudo'] = filter_var($_POST['pseudo'],FILTER_SANITIZE_STRING);
  $_POST['password'] = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  $_POST['email'] = filter_var($_POST['email'],FILTER_SANITIZE_STRING);

if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['email'])){
  global $db;
    $newpseudo = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
    $newpseudo->execute(array($pseudo));
    $pseudoin = $newpseudo->rowcount();
    $newmail = $db->prepare('SELECT * FROM users WHERE email = ?');
    $newmail->execute(array($email));
    $emailin = $newmail->rowcount();

  if($pseudoin == 0){
    if($emailin == 0){
      $info= $db->prepare("INSERT INTO users (pseudo, email, password) VALUES ('".$pseudo."', '".$email."','".$password."')");
      $info->execute(array(
        "username" => $pseudo,
        "password" => $password,
        "email" => $email));
          header('location: index.php');
    }
    else {
      $error = "Cette adresse email existe déjà!";
    }
  }
  else {
    $error = "Ce pseudo existe déjà!";
  }
}
else {
  $error = "Veuillez compléter le formulaire!";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>INSCRIPTION</title>
</head>
<body>
  <section class="form">
    <h1>NOUVEL UTILISATEUR</h1>
      <div class="enregistrer">
        <form method="post" action="register.php">
          <div class="email">
            EMAIL:
                <input type="text" name="email" placeholder="Insérez votre adresse email" required
            value=<?php if(isset($email)) {echo($email); }?>></br>
        </div>
          <div class="pseudo">
            PSEUDO:
              <input type="text" name="pseudo" placeholder="Choisissez un nom d'utilisateur" value=<?php if(isset($username)){ echo($username); }?>></br>
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
  </section>
</body>
</html>
