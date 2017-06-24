<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 18:17 AM
 */

 class Route
 {
   // Store get routes [path => COntroller@method]
   public static $_get = array();

   // Store post routes [path => COntroller@method]
   public static $_post = array();

   function __construct()
   {
     # code...
   }

   // Register post routes
   public static function get($path, $action)
   {
     self::$_get["{$path}"] = $action;
     return $this;
   }

   // Register post routes
   public static function post($value='')
   {
     # code...
   }

   // Register authentication routes
   public static function auth()
   {
     // Login Route
     self::$_get['login'] = 'LoginController@auhenticate';

     // Register Routes
     self::$_get['register'] = 'RegisterController@create';

     return $this;
   }

   public function all($method)
   {
     if ($method == "get") {
       return self::$_get;
     }elseif ( $method == "post") {
       return self::$_post;
     }
   }
 }
