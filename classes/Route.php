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
   public static function post($path, $action)
   {
     if ($path == '/') {
       self::$_post["{$path}"] = $action;
     }else {
       // Remove trailling slashes
       $path = trim($path, '/');
       // Manually add a slash at the begining
       $path = '/'.$path;

       self::$_post["{$path}"] = $action;
     }
     return $this;
   }

   // Register authentication routes
   public static function auth()
   {
     // Login View
     self::$_get['/login'] = 'Login_Controller@index';

     // Submitting Login Form-data
     self::$_post['/login'] = 'Login_Controller@authenticate';

     // Register View
     self::$_get['/register'] = 'Register_Controller@index';

     // Submitting Register Form-data
     self::$_post['/register'] = 'Register_Controller@register';

     return $this;
   }

   // Retrieve all registered routes
   public function getAll($method)
   {
     if ($method == "GET") {
       return self::$_get;
     }
     elseif ( $method == "POST") {
       return self::$_post;
     }
   }
 }
