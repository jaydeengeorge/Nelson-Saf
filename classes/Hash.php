<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:57 AM
 *
 * Lincence: [MIT license]
 */
class Hash
{
    public static function password($password)
    {
        return md5($password);
    }
    public static function make($string)
    {
    }

}
