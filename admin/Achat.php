<?php
include_once("BoutiqueModele.php");

class Achat extends BoutiqueModele
{
    private $idAchat, $adresse, $gameId;

    function __construct()
    {
        parent::__construct();
    }

    function insert($cin, $gameId)
    {
        $query = "INSERT INTO achat (achat, game_id) VALUES (?, ?)";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($cin, $gameId));
    }

    // Add more methods as needed...

    function liste()
    {
        $query = "SELECT * FROM achat";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>