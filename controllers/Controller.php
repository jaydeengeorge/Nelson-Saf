<?php
/**
 * Author: <jomwashighadi@gmail.com>
 * Date: 06/24/17
 * Time : 20:29 PM
 *
 */
 namespace controllers;

 use classes\View;

 class Controller
 {
   function __construct($method, $args = null)
   {
     if ($args) {
       $args = explode('=', $args);
       $args = array($args[0] => $args[1]);
     }

     if ($method) {
       return $this->$method($args);
     }
     return $this->index($args);
   }

   public function __call($method, $args)
   {
     $data['error'] = "Trying to access undefined method {$method}";
     return new View('404', $data);
   }
 }
