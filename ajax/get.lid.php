<?php
    include '../inc/inc.database.php';

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $stmt = $conn->prepare('SELECT * FROM leden WHERE lid_id = ?');
    $stmt->execute([$id]);
    $lid = $stmt->fetch();

    echo json_encode($lid);