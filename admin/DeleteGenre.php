<?php
include_once("Genre.php");
$genre = new Genre();
$id = $_POST['id'];
$genre->delete($id);
header('Location: genres.php');
?>