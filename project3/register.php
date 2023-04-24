<?php

if(empty($_POST["first-name"])){
    die("firstname required");
}

if(empty($_POST["last-name"])){
    die("lastname required");
}

if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if($_POST["password"] !== $_POST["confirm-password"]){
    die("passwords must match");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user(first_name, last_name, email_address, DOB, city, gender, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                $_POST["first-name"],
                $_POST["last-name"],
                $_POST["email"],
                $_POST["date-of-birth"],
                $_POST["hometown"],
                $_POST["gender"],
                $_POST["password"]);

$stmt->execute();

header("location: signdone.html");
exit;
#print_r($_POST);