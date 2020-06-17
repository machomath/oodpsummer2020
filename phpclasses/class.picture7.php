<?php
/**
 *
 */
require_once 'class.setter7.php';
class Picture extends Setter
{
  protected $_attributes = [
    "id" => null,
    "owner_id" => null,
    "title" => null,
    "caption" => null,
    "file_name" => null,
    "file_type" => null,
    "file_size" => null,
    "share_status" => null,
    "date_uploaded_on" => null,
  ];

  protected function _set_owner_id($value)
  {
    try {
      $this->_attributes["id"] = $this->_int_validity($value);
    } catch (Exception $e) {
      throw new Exception($e->getMessage() . "owner_id");
    }
  }

  protected function _set_title($value)
  {
    try {
      $this->_attributes["title"] = $this->_string_validity($value, 256);
    } catch (Exception $e) {
      throw new Exception($e->getMessage() . ": title");
    }
  }


}


?>
