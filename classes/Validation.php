<?php

namespace  General\classes;
use General\classes\Required ;
use General\classes\Str ;


require_once 'Str.php';
require_once 'Required.php';




class Validation
{

    private $errors = [];
    public function endValidate($key, $value, $rules)
    {
        foreach ($rules as $rule) {
            $rule="General\classes\\".$rule ;
            $obj = new $rule;
            $result = $obj->check($key, $value);
            if ($result != false) {
                $this->errors[] = $result;
            }
        }

        
    }
    public function getError() {

        return $this->errors ;
    }
}
