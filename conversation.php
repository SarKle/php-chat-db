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
$req = $bdd->prepare('INSERT INTO messages (pseudo, message) VALUES(?, ?)');

$req->execute(array($_POST['pseudo'], $_POST['message']));

//Affiche les 5 derniers messages
$send=$db->query('SELECT pseudo, send FROM messages ORDER BY ID DESC LIMIT 0,5');




?>
