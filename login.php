<?php
include_once("Client.php");
$mail = $_POST['mail'];
$pass = $_POST['password'];

if ($mail === "admin") {
    header('Location: admin/index.php');
} else {
    $client = new Client();

    $loginResult = $client->login($mail, $pass);

    if ($loginResult) {
        header('Location: user/index.php?adresse=' . urlencode($mail));
    } else {
        header('Location: login.php');
    }
}
?>