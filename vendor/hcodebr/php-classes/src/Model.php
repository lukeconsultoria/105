<?php 

namespace Hcode; // essa classe é dos get e sets 

class Model {

  private $values = [];

  public function __call($name, $args)
  {

    $method = substr($name, 0, 3);
    $fieldName = substr($name, 3, strlen($name));

    switch ($method)
    {

      case "get":
        return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
      break;

      case "set":
        $this->values[$fieldName] = $args[0];
      break;

    }

  }
  public function setData($data = array())//aqui tras todos os dados do get e set dinamicamente e leva para classe model/user
  {
    foreach ($data as $key => $value) {
      $this->{"set".$key}($value);
    }
  }
  public function getValues()
  {
    return $this->values;
  }
}