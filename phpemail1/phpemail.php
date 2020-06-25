<?php
  //Mind there is no security in this code
  if(isset($_POST["send"])){
    mail($_POST["to"], $_POST["subject"], $_POST["message"]);
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Sending PHP email First Attempt</h1>
    <form  method="post">
      <input type="text" name="subject" placeholder="Subject"><br>
      <input type="email" name="to" placeholder="To"><br>
      <textarea name="message" rows="8" cols="80" placeholder="Message"></textarea><br>
      <button type="submit" name="send">Send</button>
    </form>

  </body>
</html>
