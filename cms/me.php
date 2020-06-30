<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once  __DIR__ . '/public/layouts/head.php'; ?>
  <?php
    if(isset($_POST["signup"], $_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"])
       && is_string($_POST["first_name"]) && is_string($_POST["last_name"])
       && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
       && !$my_session->is_signed_in()
     ){
      try {
        $user = new User([
          "id" => 0,
          "first_name" => $_POST["first_name"],
          "last_name" => $_POST["last_name"],
          "email" => $_POST["email"],
          "password" => $_POST["password"]
        ]);
        $user->insert_into_db();
        $_SESSION["alert_message"] = "A new account is created, please signin";
      } catch (Exception $e) {
        $_SESSION["alert_message"] = $e->getMessage();
      }

    }
  ?>
  <?php
    if(isset($_POST["signin"], $_POST["email"], $_POST["password"]) &&
       filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        !$my_session->is_signed_in()){
         try {
           $user = new User([
             "id" => 0,
             "first_name" => "nfn",
             "last_name" => "nln",
             "email" => $_POST["email"],
             "password" => $_POST["password"]
           ]);
           $result = $user->find_in_db("email");
           if(!empty($result) && password_verify($_POST["password"].$pepper, $result[0]["password"])){
             ////////////////////
             $my_session->signin($result[0]); //$result[0] refers to the user found in db
             header("Location: mywall.php");
             ////////////////////
           }else{
              $_SESSION["alert_message"] = "The account info does not match.";
           }
         } catch (Exception $e) {
           $_SESSION["alert_message"] = $e->getMessage();
         }
    }
  ?>

  <?php
    if(isset($_POST["forgot_password"], $_POST["email"], $_POST["pin"], $_POST["password"]) &&
       filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
       !$my_session->is_signed_in() &&
       $_POST["pin"] == $_SESSION["pin"] &&
       $_SESSION["pin_exp"] >= time() &&
       $_SESSION["email"] === $_POST["email"]
        ){
         unset($_SESSION["pin_exp"], $_SESSION["pin"], $_SESSION["email"]);
         try {
           $user = new User([
             "id" => 0,
             "first_name" => "nfn",
             "last_name" => "nln",
             "email" => $_POST["email"],
             "password" => $_POST["password"]
           ]);
           if($user->update_in_db("password", "email")){
             $_SESSION["alert_message"] = "Your password is updated";
           } else{
             $_SESSION["alert_message"] = "Please try again";
           }
         } catch (Exception $e) {
           $_SESSION["alert_message"] = $e->getMessage();
         }
    }
  ?>

  <?php
    if(isset($_POST["signout"]) && $my_session->is_signed_in()){
      $my_session->signout();
    }
  ?>
  <body>
    <?php require_once  __DIR__ . '/public/layouts/navbar.php'; ?>

    <?php if (!$my_session->is_signed_in()) { ?>
      <h2>Signup</h2>
      <form method="post">
        <input type="text" name="first_name" placeholder="Frist Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signup">Signup</button>
      </form>
      <h2>Signin</h2>
      <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signin">Signin</button>
      </form>
      <h2>Forgot Password</h2>
      <form method="post">
        <input id="forgot-email" type="email" name="email" placeholder="Email" required>
        <input type="text" name="pin" placeholder="Please get the PIN" required>
        <input type="password" name="password" placeholder="New Password" required>
        <button type="submit" name="forgot_password">Get Password</button>
      </form>
    <?php } else { ?>
      <h2>Signout</h2>
      <form method="post">
        <button type="submit" name="signout">Signout</button>
      </form>
    <?php } ?>
    <?php
      if(isset($_SESSION["alert_message"]) ){
        echo '
        <script type="text/javascript">
          alert("'. $_SESSION["alert_message"] .'");
        </script>
        ';
        unset($_SESSION["alert_message"]);
      }
     ?>
     <script type="text/javascript" src="./public/js/ajax-func.js"></script>
  </body>
</html>
