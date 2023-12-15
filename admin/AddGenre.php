<?php
include_once("Genre.php");

$genre = new Genre();

$id = $_POST['id'];
$name = $_POST['name'];

$genre->insert($id, $name);
header('Location: genres.php');
?>