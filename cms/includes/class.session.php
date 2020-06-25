<?php
/**
 *
 */
class Session
{

  function __construct()
  {
    session_start();
  }
  public function signin($user_attributes)
  {
    $_SESSION["user_attributes"] = $user_attributes;
    $_SESSION["is_signed_in"] = true;
  }
  public function signout($value='')
  {
    unset($_SESSION["user_attributes"]);
    $_SESSION["is_signed_in"] = false;
  }
  public function is_signed_in($value='')
  {
    return isset($_SESSION["is_signed_in"]) ? $_SESSION["is_signed_in"] : false;
  }
}

$my_session = new Session();

?>
