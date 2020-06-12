<?php
  require_once 'class.user4.php';
  $user_1 = new User(20, "Frank", "Lewis", "anyemail", "123");
  // $user_1->id = 5;
  // $user_1->first_name = "Manthan";
  // $user_1->last_name = "Patel";
  $user_1->attributes["email"] = "fl@ut";
  // $user_1->password = "  ";
  $user_1->username = "fl";
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
        echo "id: " . $user_1->attributes["id"] . "<br>";
        echo "First Name: " . $user_1->attributes["first_name"] . "<br>";
        echo "Last Name: " . $user_1->attributes["last_name"] . "<br>";
        echo "Email: " . $user_1->attributes["email"] . "<br>";
        echo "Password: " . $user_1->attributes["password"] . "<br>";
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
