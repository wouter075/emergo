<?php
    // naam van de functie ben ik het nog niet overeens.
    function getLeden() {
        global $conn;
        $result = $conn->query("SELECT * FROM leden")->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
