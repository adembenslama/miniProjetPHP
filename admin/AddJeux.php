<?php
include_once("Jeu.php");

$jeu = new Jeu();

$id = $_POST['id'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$stock = $_POST['stock'];
$gallerie = 0;
$genre = $_POST['genre'];

// Check if the file is uploaded successfully
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageData = file_get_contents($_FILES['image']['tmp_name']);
} else {
    // Handle file upload error (if any)
    $imageData = ''; // Set a default image or handle it as per your requirements
}

$jeu->insert($id, $nom, $prix, $stock, $imageData, $gallerie, $genre);

header('Location: jeux.php');
?>