<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once  __DIR__ . '/public/layouts/head.php'; ?>
  <?php
    if(!(isset($_SESSION["is_signed_in"]) && $_SESSION["is_signed_in"])){
      $_SESSION["alert_message"] = "Please signin first";
      header("Location: me.php");
    }
  ?>
  <body>
    <?php require_once  __DIR__ . '/public/layouts/navbar.php'; ?>
    <h1>This page contains my personal items</h1>
    <p>So I have to be signedin to get here</p>

  </body>
</html>
