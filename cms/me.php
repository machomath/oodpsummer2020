<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once  __DIR__ . '/public/layouts/head.php'; ?>
  <?php
    if(isset($_POST["signup"], $_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"])
       && is_string($_POST["first_name"]) && is_string($_POST["last_name"])
       && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
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
       filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
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
             echo "Login procedure will come here";
           }else{
              $_SESSION["alert_message"] = "The account info does not match.";
           }
         } catch (Exception $e) {
           $_SESSION["alert_message"] = $e->getMessage();
         }
    }
  ?>
  <body>
    <?php require_once  __DIR__ . '/public/layouts/navbar.php'; ?>

    <?php if (1) { ?>
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
    <?php } else { ?>
      <h2>Signout</h2>
      <form method="post">
        <button type="submit" name="signin">Signin</button>
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
  </body>
</html>
