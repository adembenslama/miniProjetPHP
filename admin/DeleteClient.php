<?php
include_once("Client.php");

$client = new Client();
$client->delete($_POST['id']);

header('Location: clients.php');
exit;
?>