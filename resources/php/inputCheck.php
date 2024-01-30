<?php

class inputCheck
{

    public static function minLength($title, $dspt)
    {
        if (strlen($title) < 5 || strlen($dspt) < 5) {
            return false;
        }
        return true;
    }

    public static function maxLengthTitle($title)
    {
        if (strlen($title) > 75) {
            return false;
        }
        return true;
    }

    public static function maxLengthDspt($dspt)
    {
        if (strlen($dspt) > 500) {
            return false;
        }
        return true;
    }

    public static function iconName($icon)
    {
        $icons = array(
            "facebook",
            "instagram",
            "xtwitter",
            "noicon"
        );
        if (in_array($icon, $icons, true)) {
            return true;
        } elseif (in_array($icon, $icons, true)) {
            return true;
        } elseif (in_array($icon, $icons, true)) {
            return true;
        } elseif (in_array($icon, $icons, true)) {
            return true;
        } else
            return false;
    }

    public static function link($link)
    {
        if (! empty($link)) {
            if (filter_var($link, FILTER_VALIDATE_URL) !== false) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}

?>