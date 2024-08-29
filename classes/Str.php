<?php    
namespace  General\classes;
use General\classes\Validator ;
require_once 'Validator.php' ;

class Str implements Validator {

    public function check($key, $value)
    {
        if (is_numeric($value)) {
            return "$key must be string  ";
        } else {
            return false;
        }
    }
}