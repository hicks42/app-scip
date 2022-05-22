<?php

namespace App\Service;

class NameFormater
{

  function camel_to_snake($input)
  {
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
  }

  function snakeToCamel($input)
  {
    return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
  }
}
