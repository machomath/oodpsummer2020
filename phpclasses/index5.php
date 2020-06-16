<?php
  try {
    require_once 'class.user5.php';
    $user_1 = new User(20, "Frank", "Lewis", "anyemail@g.com", "123456");
    // $user_1->id = 5;
    // $user_1->first_name = "Manthan";
    // $user_1->last_name = "Patel";
    $user_1->set_email("a1_sona@gm.com");
    // $user_1->password = "  ";

  } catch (Exception $e) {
    echo $e->getMessage();
  }
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
        if(isset($user_1)){
          echo "id: " . $user_1->get_id() . "<br>"; 
          echo "First Name: " . $user_1->get_first_name() . "<br>";
          echo "Last Name: " . $user_1->get_last_name() . "<br>";
          echo "Email: " . $user_1->get_email() . "<br>";
          echo "Password: " . $user_1->get_password() . "<br>";
          echo "Username: " . $user_1->username . "<br>";
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
