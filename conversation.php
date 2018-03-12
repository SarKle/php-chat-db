<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

try{
//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
die('Erreur : '.$e->getMessage());
}

if(isset($_POST['send']) AND isset($_POST['mesg']) AND !empty($_POST['mesg'])){
  $_POST['mesg'] = filter_var($_POST['mesg'],FILTER_SANITIZE_STRING);
    $message=htmlspecialchars($_POST['mesg']);
    $message=trim($_POST['mesg']);
      $insertmess=$db->prepare('INSERT INTO messages (send, users_id)VALUES (?,?)');

        $insertmess->execute(array(
          $message,
          $_SESSION['id']
          ));
}
$allmesg=$db->query('SELECT * FROM messages INNER JOIN users ON messages.id_messages=users.id ORDER BY id_messages DESC LIMIT 0,10');
//$allmesg=$db->query('SELECT * FROM messages ORDER BY id_messages DESC LIMIT 0,10');
  $chat=$allmesg->fetchAll(PDO::FETCH_ASSOC);
    foreach($chat as $value){
      var_dump($value['pseudo']);
  //    echo $value['message'];
    }

    $insertme=$db->prepare('SELECT * FROM users INNER JOIN messages ON users.id=messages.users_id');
      $insertme->execute();
      $table=$insertme->fetchAll();
      foreach($table as $value){
        echo $value['pseudo'];
        echo $value['send'];
      }

?>
