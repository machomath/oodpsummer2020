<?php
  $my_first_array = [20, 10, "A string", true];
  $my_associte_array = [
    "id" => 30,
    "first_name" => "Manthan",
    "last_name" => "Patel",
    "email" => "mp@sm",
    "password" => "123"
  ];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Knowing Arrays</h1>
    <?php
      var_dump($my_first_array);
    ?>
    <pre>
      <?php
        var_dump($my_associte_array);
       ?>
    </pre>
    <p>
      First Name:  <?php echo $my_associte_array["first_name"] ?>

    </p>


  </body>
</html>
