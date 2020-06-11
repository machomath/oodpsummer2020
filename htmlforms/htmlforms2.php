<?php
  if(isset($_GET["full_name"], $_GET["email"], $_GET["password"])){
    // echo "Full Name: " . $_POST["full_name"] . "<br>";
    // echo "Email: " . $_POST["email"] . "<br>";
    // echo "Password: " . $_POST["password"] . "<br>";
    $full_name = $_GET["full_name"];
    $email =  $_GET["email"];
    $password =  $_GET["password"];
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Welcome <?php echo  isset($full_name) ? $full_name : null; ?> ,</h1>
    <h1>Let us know about forms</h1>
    <p>
      A form is used to get data input from a user.
    </p>
    <form method="get">
      <input type="text" name="full_name" value="" placeholder="Full Name">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">

      <button type="submit" name="send_button" value="1">Send</button>

    </form>
    <a href="htmlforms2.php?full_name=John+Smith&email=js%40g&password=123">Get me John</a>

  </body>
</html>
