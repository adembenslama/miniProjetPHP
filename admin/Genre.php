<?php
include_once("BoutiqueModele.php");

class Genre extends BoutiqueModele
{
    private $id, $name;

    function __construct()
    {
        parent::__construct();
    }

    function insert($id, $name)
    {
        $query = "INSERT INTO genre (idGenre, nom) VALUES (?, ?)";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($id, $name));
    }

    function delete($id)
    {
        $query = "DELETE FROM genre WHERE IdGenre=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($id));
    }

    function getAllGenres()
    {
        $query = "SELECT * FROM genre";
        $res = $this->pdo->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function getGenreById($id)
    {
        $query = "SELECT * FROM genre WHERE id=?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    function liste()
    {
        $query = "SELECT * FROM genre";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>