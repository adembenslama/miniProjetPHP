<?php
include_once("BoutiqueModele.php");

class Jeu extends BoutiqueModele
{
    private $idJeu, $nom, $prix, $stock, $image, $gallerie, $genre;

    function __construct()
    {
        parent::__construct();
    }

    function insert($idJeu, $nom, $prix, $stock, $image, $gallerie, $genre)
    {
        $query = "INSERT INTO jeu (idJeu, nom, prix, stock, image, gallerie, genre) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idJeu, $nom, $prix, $stock, $image, $gallerie, $genre));
    }

    function delete($idJeu)
    {
        $query = "DELETE FROM jeu WHERE IdJeu=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idJeu));
    }
    function update($idJeu, $nom, $prix, $stock, $genre)
    {
        $query = "UPDATE jeu SET nom=?, prix=?, stock=?, genre=? WHERE IdJeu=?";
        $res = $this->pdo->prepare($query);

        $updateResult = $res->execute(array($nom, $prix, $stock, $genre, $idJeu));

        return $updateResult;
    }

    function getAllJeux()
    {
        $query = "SELECT * FROM jeu";
        $res = $this->pdo->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function getJeuById($idJeu)
    {
        $query = "SELECT * FROM jeu WHERE IdJeu=?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($idJeu));
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    function liste()
    {
        $query = "SELECT * FROM jeu";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>