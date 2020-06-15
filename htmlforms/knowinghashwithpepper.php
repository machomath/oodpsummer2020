<?php
$password_1 = "123" . "COVID19BYE!summer2020"; // "COVID19BYE" is pepper
$hash_1 = password_hash($password_1, PASSWORD_DEFAULT);


$stored_hash = $hash_1;
$password_new = "123";

if(password_verify($password_new . "COVID19BYE!summer2020", $hash_1)){
  echo "The two passwords are identical";
}else{
  echo "The two passwords are different";
}


?>
