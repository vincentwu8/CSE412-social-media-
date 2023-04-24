<?php

session_start();

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

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
    <link rel="stylesheet" href="album.css">
</head>
<body>
<header>
    <h1>Create Album Page</h1>
  </header>
  <?php if (isset($_SESSION["user_id"])): ?>

<p><?= htmlspecialchars($user["first_name"]) ?>'s album page</p>

<p><a href="logout.php"> Log out</a></p>

<?php else: ?>
<p><a href="login.php"> Log in </a> or <a href="signup.html"> sign up</a></p>
<?php endif; ?>
  <div class="container">
  <div class="create-album">
    <h2>Create New Album</h2>
    <form action="createalbum.php" method="post">
      <label for="album-name">Album Name:</label>
      <input type="text" id="album-name" name="album-name">
      <label for="album-photo">Upload Photos:</label>
      <input type="file" id="album-photo" name="album-photo" multiple>
      <button type="submit">Create Album</button>
      <button id="tag-btn"> Tag each photos </button>
    </form>
  </div>
  <div class="album">
    <h2>My Photos</h2>
    <div class="photos">
      <img src="photo1.jpg">
      <img src="photo2.jpg">
      <img src="photo3.jpg">
      <img src="photo4.jpg">
      <img src="photo5.jpg">
      <img src="photo6.jpg">
      <img src="photo7.jpg">
      <img src="photo8.jpg">
    </div>
    <button id="view-all-btn">View All</button>
  </div>
</div>
</body>
</html>