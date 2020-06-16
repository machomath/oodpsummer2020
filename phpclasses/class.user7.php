<?php
  /**
   *
   */
  require_once 'confidencial.php';
  require_once 'class.setter7.php';
  class User extends Setter
  {
    protected $_attributes = [
      "id" => null,
      "first_name" => null,
      "last_name" => null,
      "email" => null,
      "password" => null
    ];

    protected function _set_first_name($value)
    {
      try {
        $this->_attributes["first_name"] = $this->_string_validity($value, 5);
      } catch (Exception $e) {
        throw new Exception($e->getMessage . ": First Name");
      }
    }

    protected function _set_last_name($value)
    {
      try {
        $this->_attributes["last_name"] = $this->_string_validity($value, 5);
      } catch (Exception $e) {
        throw new Exception($e->getMessage . ": Last Name");
      }
    }

    protected function _set_email($value)
    {
      if(filter_var($value, FILTER_VALIDATE_EMAIL)){
        $this->_attributes["email"] = filter_var(trim($value), FILTER_SANITIZE_EMAIL);
      }else{
        throw new Exception("Email is not good");
      }
    }

    protected function _set_password($value)
    {
      global $pepper;
      if($this->_validate_password($value)){
        $this->_attributes["password"] = password_hash(trim($value).$pepper, PASSWORD_DEFAULT);
      }else{
        throw new Exception("Please give password according to our policy");
      }

    }

    protected function _validate_password($value)
    {
      if(strlen(trim($value)) >= 6 ) {//here we can have any policy
        return true;
      }else{
        return false;
      }
    }


  }


 ?>
