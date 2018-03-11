<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  if(isset($_SESSION['id'])){

try{
//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
die('Erreur : '.$e->getMessage());
}


global $dbb;

if(isset($_POST['send']) && isset($_POST['message']) && !empty($_SESSION['pseudo'])){
  $_POST['message'] = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
  $newmess = $db->prepare('INSERT INTO messages (pseudo, send) VALUE (?, ?)');
  // $user = $_SESSION['id'];
  $newmess->execute(array( $_POST['id'], $_POST['message']));
  }
    header("Location:chat.php");
}
 //
 // $result = $db->prepare('SELECT * FROM messages LEFT JOIN users ON users_id = message.users_id ORDER BY DESC');
 // $result->execute();
 // $msg=$result->fetchAll();
 //
 //   foreach ($msg as $value) {
 //     echo $value['message'];
 //   }
 //
 //     $conversation=$db->query('SELECT * FROM messages ORDER BY id DESC');
 //       while($message=$conversation->fetch()){
 //         echo $message['pseudo'];

   ?>
