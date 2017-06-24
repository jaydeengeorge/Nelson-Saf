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

   public static function get($path, $action)
   {
     self::$_get["{$path}"] = $action;
     return $this;
   }

   public static function post($value='')
   {
     # code...
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
