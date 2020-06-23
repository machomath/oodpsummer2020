<?php
  session_start();
  if(isset($_POST["name"])){
    $_SESSION["name"] = $_POST["name"];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Welcome <?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : null; ?></h1>
    <?php if (!isset($_SESSION["name"])): ?>
      <form method="post">
        <input type="text" name="name" placeholder="Please tell us your name">
        <button type="submit" name="button">Submit</button>
      </form>
    <?php endif; ?>
  </body>
</html>
