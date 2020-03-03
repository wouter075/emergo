<?php
include '../inc/inc.database.php';

$naam = filter_var($_GET['naam'], FILTER_SANITIZE_STRING);
$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
$telefoon = filter_var($_GET['telefoon'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO leden (naam, telefoon, email) VALUES (?, ?, ?)";
$conn->prepare($sql)->execute([$naam, $telefoon, $email]);

# todo: loggin
echo 1;