<?php
try {
  $bd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
  // En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CHAT</title>
</head>

<body>
  <h2>Login</h2>
 <form action="login.php" method="post">
  <label for "pseudo">Pseudo:</label>
    <input type="text" name"=pseudo" placeholder="pseudo"> <br>
  <label for "password">Password:</label>
    <input type="password" name"=password" placeholder="password"> <br>
  <input type=submit name="submit" value="login">
 </form>

 <form action="signup.php" method="post">
   <h2>Pas encore inscrit?</h2>
     <label for "pseudo"> Pseudo: </label>
     <input type="text" name"=pseudo" placeholder="pseudo"> <br>
     <label for "email"> Email: </label>
     <input type="text" name"=email" placeholder="email"> <br>
     <label for "password">Password:</label>
     <input type="password" name"=password" placeholder="password"> <br>
     <input type=submit name="submit" value="signUp">
  </form>
</body>
</html>
