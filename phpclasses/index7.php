<?php
  try {
    require_once 'class.user7.php';
    $user_1 = new User([
      "id" => 1,
      "first_name" => "<script>alert('you are hacked')</script>",
      "last_name" => "Lewis",
      "email" => "anyemail@g.com",
      "password" => "123456"
    ]);
    // $user_1->id = 5;
    // $user_1->first_name = "Manthan";
    // $user_1->last_name = "Patel";
    $user_1->email = "a1_sona@gm.com";
    // $user_1->password = "  ";
    $user_1->username = "fl";
  } catch (Exception $e) {
    echo $e->getMessage();
  }


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
      Once we have got magic getter we need not to call individual getter
      we can simply access the attributes by their name

    </p>
    <p>
      Once we get the magic stter we can set the attributes by their names
      and we need not to call the individual setter. But magic stter works
      in conjunction with the individual setters.
    </p>
    <p>
      <?php
        if(isset($user_1)){
          try {
            echo "id: " . $user_1->id . "<br>";
            echo "First Name: " . $user_1->first_name . "<br>";
            echo "Last Name: " . $user_1->last_name . "<br>";
            echo "Email: " . $user_1->email . "<br>";
            echo "Password: " . $user_1->password . "<br>";
            echo "Username: " . $user_1->username . "<br>";
          } catch (Exception $e) {
            echo $e->getMessage();
          }
        }
        //The following are errors
        // echo "id: " . $user_1->_attributes["id"] . "<br>";
        // echo "First Name: " . $user_1->_attributes["first_name"] . "<br>";
        // echo "Last Name: " . $user_1->_attributes["last_name"] . "<br>";
        // echo "Email: " . $user_1->_attributes["email"] . "<br>";
        // echo "Password: " . $user_1->_attributes["password"] . "<br>";
        // echo "Username: " . $user_1->username . "<br>";
       ?>
    </p>
    <p>
      This is default behavior of PHP that we can make
      extra attributes for an object if we have not
      denay them. Which we will see lateron

    </p>


  </body>
</html>
