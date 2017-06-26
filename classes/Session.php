<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:56 AM
 *
 * Lincence: [MIT license]
 */

//namespace BluePrint\classes;

class Session
{
  public $_flashed = [];

  public static $_instance;
    /**
     * Check if a session is set for given var
     *
     * @param $name
     * @return bool
     */
    public static function has($name)
    {
        if (isset($_SESSION[$name]))
            return true;
        return false;
    }

    /**
     * Creates a session named $name with $value
     *
     * @param $name
     * @param $value
     * @return mixed
     */
    public static function put($name, $value)
    {
        if(self::has($name)){
            self::forget($name);
        }
        return $_SESSION[$name] = $value;
    }

    /**
     * Retrieves existing Session variable.
     *
     * @param $name
     * @return null
     */
    public static function get($name)
    {
        if(self::has($name))
            return $_SESSION[$name];
        return null;
    }

    public function setpreviousUrl($url)
    {
      return $_SESSION['previousUrl'] = $url;
    }

    /**
     * Deleting a session variable
     * @param $name
     * @return bool
     */
    public static function forget($name)
    {
        if (self::has($name)) {
            unset($_SESSION[$name]);
            return true;
        }
    }

    // Set a session maintained for one request
    public static function putErrors($value)
    {
      self::put('errors',  $value);
    }

    public static function flush()
    {
      if (session_id()) {
        # code...
      }
    }

    public static function getInstance()
    {
      if (!self::$_instance) {
        self::$_instance = new Session;
      }
      return self::$_instance;
    }
}
