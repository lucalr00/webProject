<?php

class inputCheck
{

    public static function minLength($title, $dspt)
    {
        if (strlen($title) < 4 || strlen($dspt) < 4) {
            return false;
        }
        return true;
    }

    public static function maxLengthTitle($title)
    {
        if (strlen($title) > 30) {
            return false;
        }
        return true;
    }
    
    public static function maxLengthDspt($dspt)
    {
        if (strlen($dspt) > 100) {
            return false;
        }
        return true;
    }

    public static function date_check($field)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $field) == 1) { // preg_match data
            return true;
        }
        return false;
    }

    public static function check_nome($nome)
    {
        if (strlen($nome) == 0) {
            return false;
        }
        if (preg_match('/^([\p{L}\s]*)$/u', $nome) == 1) {
            return true;
        }
        return false;
    }

    public static function check_pwd($password)
    {
        if (preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/', $password) == 1) {
            return true;
        }
        return false;
    }

    public static function check_email($email)
    {
        if (preg_match('/^([\w\-\+\.]+)\@([\w\-\+\.]+)\.([\w\-\+\.]+)$/', $email) == 1) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
        }
        return false;
    }
}

?>