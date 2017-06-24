<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 18:17 AM
 */
 // namespace classes;


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
     if ($path == '/') {
       self::$_get["{$path}"] = $action;
     }else {
       // Remove trailling slashes
       $path = trim($path, '/');
       // Manually add a slash at the begining
       $path = '/'.$path;

       self::$_get["{$path}"] = $action;
     }
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
     self::$_get['/login'] = 'Login_Controller@authenticate';

     // Register Routes
     self::$_get['/register'] = 'Register_Controller@create';

     return $this;
   }

   public function getAll($method)
   {
     if ($method == "get") {
       return self::$_get;
     }elseif ( $method == "post") {
       return self::$_post;
     }
   }
 }
