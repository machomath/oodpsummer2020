<?php
  require_once 'class.user1.php';
  $user_1 = new User();
  $user_1->id = 5;
  $user_1->first_name = "Manthan";
  $user_1->last_name = "Patel";
  $user_1->email = "anyemail";
  $user_1->password = "  ";
  $user_1->username = "manp";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Understanding PHP Classes</h1>
    <p>
      <?php
        echo "id: " . $user_1->id . "<br>";
        echo "First Name: " . $user_1->first_name . "<br>";
        echo "Last Name: " . $user_1->last_name . "<br>";
        echo "Email: " . $user_1->email . "<br>";
        echo "Password: " . $user_1->password . "<br>";
        echo "Username: " . $user_1->username . "<br>";
       ?>
    </p>
    <p>
      This is default behavior of PHP that we can make
      extra attributes for an object if we have not
      denay them. Which we will see lateron

    </p>


  </body>
</html>
