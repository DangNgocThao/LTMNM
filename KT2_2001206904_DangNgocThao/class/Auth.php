<?php
class Auth
{
    public static function login($name, $pass)
    {
        if (($name == "admin" && $pass == "123") || ($name == "thao" && $pass == "123")) {
            $_SESSION['log_detail'] = $name;
            header("Location:index.php");
            exit();
        } else {
            return "UserName hoặc Password không đúng";
        }
    }

    public static function logout()
    {
        unset($_SESSION['log_detail']);
        header("Location:index.php");
        exit();
    }
}
