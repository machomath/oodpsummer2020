<?php
  require_once 'phpfunctions.php';
  if(isset($_POST["full_name"], $_POST["email"], $_POST["password"]) &&
     is_string($_POST["full_name"]) &&
     filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
     check_password_validity($_POST["password"])){
    // echo "Full Name: " . $_POST["full_name"] . "<br>";
    // echo "Email: " . $_POST["email"] . "<br>";
    // echo "Password: " . $_POST["password"] . "<br>";
    $full_name = filter_var(trim($_POST["full_name"]), FILTER_SANITIZE_STRING);
    $email =  filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password =  $_POST["password"];
  }else{
    echo "Something is wrong";
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
    <h2>So what is hash?</h2>
    <ol>
      <li>
        It is a kind of encryption but totally different
        <ul>
          <li>Encryption is always reversible</li>
          <li>Hash is always non reversible</li>
        </ul>
      </li>
      <li>A small change in input string cause unpridictable changes in the hash</li>
      <li>Hashing is deterministic</li>
      <li>Hashing is fast and simple</li>
      <li>Hashing must be slow</li>
      <li>Hashing is not unique, that is for two different strings we may may get the same hash</li>
      <li>But the probability of gettiing the same hashes for two known strings is extremely low </li>
    </ol>

  </body>
</html>
