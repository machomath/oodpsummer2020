<?php
  require_once __DIR__ . "/../../includes/inc.php";
  require_once __DIR__ .'/../../emailviaphpmailer.php';
  if(isset($_GET["email"]) && filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)
     && !$my_session->is_signed_in()){
       $to = filter_var($_GET["email"], FILTER_SANITIZE_EMAIL);
       try {
         $user = new User([
           "id" => 0,
           "first_name" => "nfn",
           "last_name" => "nln",
           "email" => $to,
           "password" =>"npw12345"
         ]);
         // echo implode("***", $user->find_in_db("email"));
         $result = $user->find_in_db("email");
         if(!empty($result)){
           $pin = $_SESSION["pin"] = rand(100000, 999999);
           $_SESSION["pin_exp"] = time() + 15*60;
           $to = $result[0]["email"];
           $to_name = $result[0]["first_name"];
           $subject = "PIN for your reset password " . $pin ;
           $body = "Dear ". $to_name . "<br>";
           $body .= "Here is the password reset PIN for you. If ....";
           sendEmail($to, $to_name, $subject, $body);
           echo "Please check your inbox for PIN...";
         }
       } catch (Exception $e) {
         echo $e->getMessage();
       }
  }

 ?>
