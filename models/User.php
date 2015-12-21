<?php

class User
{
    public static function checkName($name)
    {
        return(strlen($name) > 1) ? true : false;
    }

    public static function checkPassword($password)
    {
        return(strlen($password) > 5) ? true : false;
    }

    public static function checkEmail($email)
    {
        return(filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }
}