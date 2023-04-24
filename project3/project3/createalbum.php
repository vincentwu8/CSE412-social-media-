<?php
session_start();

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO albums( Name, user_id, Date_of_creation)
        VALUES (?, ?, ?)";


$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$date = date('Y-m-d H:i:s');

$stmt->bind_param("sss",
        $_POST["album-name"],
        $_SESSION['user_id'],
        $date);

$stmt->execute();
exit;
?>