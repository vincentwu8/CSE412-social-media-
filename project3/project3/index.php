<?php

session_start();

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
}

include 'database.php';
    
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
      <?php if (isset($_SESSION["user_id"])): ?>

        <p> welcome <?= htmlspecialchars($user["first_name"]) ?></p>

        <p><a href="logout.php"> Log out</a></p>

    <?php else: ?>
        <p><a href="login.php"> Log in </a> or <a href="signup.html"> sign up</a></p>
    <?php endif; ?>

    <header>
        <h1>Social Media main Page</h1>
      </header>

    <div class="container">
        <div class="friends">
          <h2>My Friends</h2>
          <form class="search-form" method ="post">
            <button formaction="search2.php" type="submit">search for friends </button>
          </form>
          <table class="table">
        </table>
          <ul>
            <li><img src="friend1.jpg"><span>Friend 1</span></li>
            <li><img src="friend2.jpg"><span>Friend 2</span></li>
            <li><img src="friend3.jpg"><span>Friend 3</span></li>
            <li><img src="friend4.jpg"><span>Friend 4</span></li>
          </ul>
        </div>
    
        <div class="albums">
          <h2>My Albums</h2>
          <form class="search-form">
            <button formaction="search.php" type="submit">Search for albums </button>
          </form>
          <ul>
            <li><img src="album1.jpg"><a href="#">Album 1</a></li>
            <li><img src="album2.jpg"><a href="#">Album 2</a></li>
            <li><img src="album3.jpg"><a href="#">Album 3</a></li>
            <li><a href="album.php" class="create">Create New Album</a></li>
          </ul>
        </div>
      </div>
</body>
</html>