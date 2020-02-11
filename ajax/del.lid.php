<?php
include '../inc/inc.database.php';

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare('DELETE FROM leden WHERE lid_id = ?');
$stmt->execute([$id]);

echo 1;