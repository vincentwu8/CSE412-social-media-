<?php

session_start();

if(isset($_SESSION["username"])){

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["username"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <title> some social media site main</title>
    <meta name="viewpoert" content="width=device-width, initaial-scale=1">
    <meta charset="UTF-8">
    <link rel = "icon" href="amongus.png"  type = "image/x-icon">
    <link rel="stylesheet" href="mainpage.css">
</head>
<body>
    <header>
        <h1>Social Media main Page</h1>
      </header>
      <?php if (isset($user)): ?>

        <p> welcome <?= htmlspecialchars($user["user_id"]) ?></p>

        <p><a href="logout.php"> Log out</a></p>

    <?php else: ?>
        <p><a href="login.php"> Log in </a> or <a href="signup.html"> sign up</a></p>
    <?php endif; ?>

</body>
</html>