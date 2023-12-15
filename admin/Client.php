<?php
include_once("BoutiqueModele.php");

class Client extends BoutiqueModele
{
    private $cin, $nom, $adresse, $telephone;

    function __construct()
    {
        parent::__construct();
    }

    function insert($ncin, $nom, $adresse, $telephone, $password)
    {
        $query = "INSERT INTO client (CIN, nom, adresse, numero , password) VALUES (?, ?, ?, ? , ?)";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($ncin, $nom, $adresse, $telephone, $password));
    }

    function delete($cin)
    {
        $query = "DELETE FROM client WHERE cin=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($cin));
    }

    function getAllClients()
    {
        $query = "SELECT * FROM client";
        $res = $this->pdo->query($query);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function getClientByCIN($CIN)
    {
        $query = "SELECT * FROM client WHERE CIN=?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($CIN));
        return $res->fetch(PDO::FETCH_ASSOC);
    }
    function liste()
    {
        $query = "SELECT * FROM client";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>