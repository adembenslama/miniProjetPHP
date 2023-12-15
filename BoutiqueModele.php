<?php
class BoutiqueModele {
    protected $pdo;

    function __construct() {
       $this->pdo = new PDO("mysql:host=localhost;dbname=Boutique", "root", "");
       
    }

}
?>