<?php

namespace General\classes ;



class  Request
{

    public function get($key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        } else {
            return "not found";
        }
    }

    public function post($key)
    {
        if (isset($_POST[$key])) {
            
            return $_POST[$key];
        } else {
            return "not found";
        }
    }

    public function  checkis($data)
    {
        return isset($data);
    }

    public function  checkem($data)
    {
        return empty($data);
    }

    public function filter($data)
    {
        return trim(htmlspecialchars($data));
    }

    public function header($location)
    {
        header("location:$location");
    }


}
