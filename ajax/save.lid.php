<?php
    include '../inc/inc.database.php';

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $naam = filter_var($_GET['naam'], FILTER_SANITIZE_STRING);
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $telefoon = filter_var($_GET['telefoon'], FILTER_SANITIZE_STRING);

//    $stmt = $conn->prepare('SELECT * FROM leden WHERE lid_id = ?');
//    $stmt->execute([$id]);
//    $lid = $stmt->fetch();
    $sql = "UPDATE leden SET naam = ?, telefoon = ?, email = ? WHERE lid_id = ?";
    $conn->prepare($sql)->execute([$naam, $telefoon, $email, $id]);

    echo $id;