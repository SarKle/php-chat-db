<?php

header('Location:conversation.php');

try{
	//Connexion à mysql
  $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch(Exception $e){
// Si erreur, stop le script
  die('Erreur : '.$e->getMessage());
}

//Enregistrement des messages dans mysql
$chat=$_POST["chat"];
  $chatsanit=filter_var($chat, FILTER_SANITIZE_STRING);

if(isset($_POST["chat"]) && isset(($_POST["send"]))){
  $req = $db->prepare('INSERT INTO messages (pseudo, send) VALUES (:pseudosanit,:mailsanit,)');
  $req->execute(array(
      'pseudosanit' => $pseudosanit,
      'mailsanit' => $mailsanit,
  ));  $req->execute(array($_POST['pseudo'], $_POST['chat']));

}
//Affiche les 7 derniers messages
$send=$db->query('SELECT pseudo, send FROM messages ORDER BY ID DESC LIMIT 0,7');


?>
