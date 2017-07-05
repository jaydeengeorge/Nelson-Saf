<?php

/**
 * Created by PhpStorm.
 * User: reaper45
 * Date: 4/7/17
 * Time: 6:56 AM
 *
 * Lincence: [MIT license]
 */

  namespace classes;

  class Session
  {
      /**
       * Check if a session is set for given var
       *
       * @param $name
       * @return bool
       */
      public static function has($name)
      {
          if (!empty($_SESSION[$name]))
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

      public static function all()
      {
        return $_SESSION;
      }
      public static function flash()
      {
          // Set a session maintained for one request
      }
  }
