<?php

session_start ();

try {
  $bd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}

?>
