<?php
  /**
   *
   */
  class User
  {
    protected $_attributes = [
      "id" => null,
      "first_name" => null,
      "last_name" => null,
      "email" => null,
      "password" => null
    ];

    function __construct($id, $first_name, $last_name, $email, $password)
    {
      try {
        $this->set_id($id);
        $this->set_first_name($first_name);
        $this->set_last_name($last_name);
        $this->set_email($email);
        $this->set_password($password);
      } catch (Exception $e) {
        throw $e;
      }

      //The following is weak code
      // $this->_attributes["id"] = $id;
      // $this->_attributes["first_name"] = $first_name;
      // $this->_attributes["last_name"] = $last_name;
      // $this->_attributes["email"] = $email;
      // $this->_attributes["password"] = $password;
    }

    public function set_id($value)
    {
      if( $value >=0 && filter_var($value, FILTER_VALIDATE_INT)){
          $this->_attributes["id"] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
      }else{
          throw new Exception("Id must be an integer");
      }
    }

    public function get_id()
    {
      return $this->_attributes["id"];
    }

    public function set_first_name($value)
    {
      if(is_string($value) && strlen(trim($value)) > 0
                           && strlen(trim($value)) <= 1024) {
          $this->_attributes["first_name"] = filter_var(trim($value), FILTER_SANITIZE_STRING);
      }else{
        throw new Exception("First name is not good");
      }

    }

    public function get_first_name()
    {
      return $this->_attributes["first_name"];
    }

    public function set_last_name($value)
    {
      if(is_string($value) && strlen(trim($value)) > 0
                           && strlen(trim($value)) <= 1024) {
          $this->_attributes["last_name"] = filter_var(trim($value), FILTER_SANITIZE_STRING);
      }else{
        throw new Exception("Last name is not good");
      }

    }

    public function get_last_name()
    {
      return $this->_attributes["last_name"];
    }

    public function set_email($value)
    {
      if(filter_var($value, FILTER_VALIDATE_EMAIL)){
        $this->_attributes["email"] = filter_var(trim($value), FILTER_SANITIZE_EMAIL);
      }else{
        throw new Exception("Email is not good");
      }
    }

    public function get_email()
    {
      return $this->_attributes["email"];
    }

    public function set_password($value)
    {
      if($this->_validate_password($value)){
        $this->_attributes["password"] = password_hash(trim($value)."COVID19", PASSWORD_DEFAULT);
      }else{
        throw new Exception("Please give password according to our policy");
      }

    }

    public function get_password()
    {
      return $this->_attributes["password"];
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
