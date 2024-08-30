<?php

namespace General\classes   ;

class Session
{
    //start
    public function __construct()
    {
        session_start();
    }

    //set 
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    //get 
    public function get($key)
    {
        if (isset($_SESSION[$key])) {
           return $_SESSION[$key];
        } else {
            // return "not found";
        }
    }

    //unset  
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    //destroy   
    public function destroy()
    {
        session_destroy();
    }
}
