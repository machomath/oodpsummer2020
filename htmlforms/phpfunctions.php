<?php
function check_password_validity($password)
{
  //here we do all the different validity tests of password
  $length = strlen(trim($password));
  //may be other checks also
  if($length >= 3){
    return true;
  }else{
    return false;
  }
}


?>
