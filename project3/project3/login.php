<?php

$is_invalid = false;
  if($_SERVER["REQUEST_METHOD"] === "POST"){
      $mysqli = require __DIR__ . "/database.php";

      $sql = sprintf("SELECT * FROM user
                      WHERE email_address = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

      $result = $mysqli->query($sql);

      $user = $result->fetch_assoc();

      if ($user){
        if ($_POST["password"] == $user["password"]){
          
          session_start();

          session_regenerate_id();

          $_SESSION["user_id"] = $user["id"];

          header("Location: index.php");
          exit;
        }
      }
      $is_invalid = true;
  }

?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>login page</title>
    <meta name="viewpoert" content="width=device-width, initaial-scale=1">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel = "icon" href="amongus.png"  type = "image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <?php if ($is_invalid): ?>
      <em>Invalid login</em>
    <?php endif; ?>

    <form method="post">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email"
              value="<?= htmlspecialchars ($_POST["email"] ?? "") ?>">

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password">

      <button type="submit">Login</button>
    </form>
    <div class="register-link">
      <p>Don't have an account? <a href="register.html">Register here</a></p>
    </div>
  </div>
</body>
</html>