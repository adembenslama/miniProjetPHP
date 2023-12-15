<?php
include_once("Client.php");

$client = new Client();
$client->insert($_POST['cin'], $_POST['nom'], $_POST['mail'], $_POST['num'], $_POST['password']);

header('Location: signin.php');
exit;
?>