<?php
  /**
   *
   */
  class User
  {
    public $attributes = [
      "id" => null,
      "first_name" => null,
      "last_name" => null,
      "email" => null,
      "password" => null
    ];

    function __construct($id, $first_name, $last_name, $email, $password)
    {
      $this->attributes["id"] = $id;
      $this->attributes["first_name"] = $first_name;
      $this->attributes["last_name"] = $last_name;
      $this->attributes["email"] = $email;
      $this->attributes["password"] = $password;
    }
  }


 ?>
