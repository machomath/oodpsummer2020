<?php
  if(isset($_POST["full_name"], $_POST["email"], $_POST["password"])){
    // echo "Full Name: " . $_POST["full_name"] . "<br>";
    // echo "Email: " . $_POST["email"] . "<br>";
    // echo "Password: " . $_POST["password"] . "<br>";
    $full_name = $_POST["full_name"];
    $email =  $_POST["email"];
    $password =  $_POST["password"];
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
    <form method="post">
      <input type="text" name="full_name" value="" placeholder="Full Name">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">

      <button type="submit" name="send_button" value="1">Send</button>

    </form>

  </body>
</html>
