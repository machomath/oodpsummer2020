<?php
  /**
   *
   */
  require_once 'confidencial.php';
  class User
  {
    protected $_attributes = [
      "id" => null,
      "first_name" => null,
      "last_name" => null,
      "email" => null,
      "password" => null
    ];

    function __construct($attributes)
    {
      try {
        foreach ($attributes as $key => $value) {
          $this->__set($key, $value);
        }
      } catch (Exception $e) {
        throw $e;
      }
    }

    public function __get($attribute)
    {
      if(array_key_exists($attribute, $this->_attributes)){
        return $this->_attributes[$attribute];
      }else{
        throw new Exception("No such attribute: ". $attribute );
      }
    }

    public function __set($attribute, $value)
    {
      if(array_key_exists($attribute, $this->_attributes)){
        $function_name = "_set_" . $attribute;
        try {
          $this->$function_name($value);
        } catch (Exception $e) {
          throw $e;
        }
      }else{
        throw new Exception("No such attribute: ". $attribute );
      }
    }

    protected function _set_id($value)
    {
      if( $value >=0 && filter_var($value, FILTER_VALIDATE_INT)){
          $this->_attributes["id"] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
      }else{
          throw new Exception("Id must be an integer");
      }
    }

    protected function _set_first_name($value)
    {
      if(is_string($value) && strlen(trim($value)) > 0
                           && strlen(trim($value)) <= 1024) {
          $this->_attributes["first_name"] = filter_var(trim($value), FILTER_SANITIZE_STRING);
      }else{
        throw new Exception("First name is not good");
      }

    }

    protected function _set_last_name($value)
    {
      if(is_string($value) && strlen(trim($value)) > 0
                           && strlen(trim($value)) <= 1024) {
          $this->_attributes["last_name"] = filter_var(trim($value), FILTER_SANITIZE_STRING);
      }else{
        throw new Exception("Last name is not good");
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
