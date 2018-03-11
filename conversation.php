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

$result = $bd->prepare('SELECT * FROM messages LEFT JOIN users ON messages_id = users_id ORDER BY DESC');
  $result->execute();
    $info = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<meta http-equiv="refresh" content="10; url=conversation.php">
<title>MYCHAT</title>
</head>
<body>
  <?php foreach($userinfo as $data):  ?>
    <label class="pseudo"> <?php echo $data['pseudo']; ?></label>
      <label class="mess"> <?php echo $data['text']; ?></label>-->
  <?php endforeach;?>
</body>
</html>
