<?php
include_once("Jeu.php");
$jeu = new Jeu();
$id = $_POST['id'];
$jeu->delete($id);
header('Location: jeux.php');
?>