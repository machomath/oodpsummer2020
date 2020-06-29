<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once  __DIR__ . '/public/layouts/head.php'; ?>
  <body>
    <?php require_once  __DIR__ . '/public/layouts/navbar.php'; ?>
    <h1>This is the home page</h1>
    <?php if ($my_session->is_signed_in()){
        $name = $_SESSION["user_attributes"]["first_name"];
      ?>
      <h2>Welcome <?php echo $name;  ?> </h2>
    <?php } ?>

  </body>
</html>
