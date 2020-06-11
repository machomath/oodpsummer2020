<?php
$password_1 = "123";
$password_2 = "122";
$hash_1 = password_hash($password_1, PASSWORD_DEFAULT);
$hash_2 = password_hash($password_2, PASSWORD_DEFAULT);
$hash_3 = password_hash($password_1, PASSWORD_DEFAULT);

echo "Hash of " .  $password_1 . " is " . $hash_1 . "<br>";
echo "Hash of " .  $password_2 . " is " . $hash_2 . "<br>";
echo "Hash of " .  $password_1 . " is " . $hash_3 . "<br>";

$stored_hash = $hash_1;
$newly_obtained_hash = $hash_3;
if($stored_hash == $newly_obtained_hash){
  echo "Match";
  //this does not work
}

if(password_verify($password_1, $hash_2)){
  echo "The two passwords are identical";
}else{
  echo "The two passwords are different";
}


?>
