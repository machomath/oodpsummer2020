<?php
/**
 *
 */
require_once 'passwords.php';
$dsn = 'mysql:host=127.0.0.1; dbname=oodpsummer2020';
$db = new PDO($dsn, "oodp20us", $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
abstract class DBObj
{
  protected $_table;
  function __construct()
  {
  }

  public function insert_into_db()
  {
    global $db;
    $values = [];
    $sql1 = "INSERT INTO ". $this->_table ." (";
    $sql2 = " VALUES (";
    foreach ($this->_attributes as $key => $value) {
      if($key !== "id"){
      $sql1 .= $key . ", " ;
      $sql2 .= "?, ";
      $values[] = $value;
      }
    }
    $sql1 = substr($sql1, 0, -2);
    $sql2 = substr($sql2, 0, -2);

    $sql = $sql1 . ")" . $sql2 . ");";
    // echo $sql;
    try {
      $statement = $db->prepare($sql);
      $statement->execute($values);
      $this->_attributes["id"] = $db->lastInsertID();
    } catch (Exception $e) {
      throw $e;
    }

  }

  //////////////////
  // public function insert_into_db()
  // {
  //   global $db;
  //   $sql1 = "INSERT INTO ". $this->_table ." (";
  //   $sql2 = " VALUES ('";
  //   foreach ($this->_attributes as $key => $value) {
  //     if($key !== "id"){
  //     $sql1 .= $key . ", " ;
  //     $sql2 .= $value . "', '";
  //     }
  //   }
  //   $sql1 = substr($sql1, 0, -2);
  //   $sql2 = substr($sql2, 0, -3);
  //
  //   $sql = $sql1 . ")" . $sql2 . ");";
  //   try {
  //     $db->exec($sql);
  //   } catch (Exception $e) {
  //     throw $e;
  //   }
  //
  // }

  ////////////////

  public function insert_into_db_first_version()
  {
    global $db;
    $sql  = "INSERT INTO users (first_name, last_name, email, password) ";
    $sql .= "VALUES ('" . $this->_attributes["first_name"] . "', '";
    $sql .= $this->_attributes["last_name"] . "', '";
    $sql .= $this->_attributes["email"] . "', '";
    $sql .= $this->_attributes["password"] . "');";
    try {
      $db->exec($sql);
    } catch (Exception $e) {
      throw $e;
    }
  }

}

?>
