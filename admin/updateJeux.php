<?php
include_once("Jeu.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $stock = $_POST['stock'];
    $genre = $_POST['genre'];


    $jeu = new Jeu();
    $updateResult = $jeu->update($id, $nom, $prix, $stock, $genre);

    if ($updateResult) {
        header('Location: Jeux.php');
        exit();
    } else {
        header('Location: index.php');

    }
} else {
    echo "Invalid request method.";
}
?>