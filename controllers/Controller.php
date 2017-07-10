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
   function __construct($method, $parameters = null)
   {
     if ($method) {
       return $this->$method($parameters);
     }
     return $this->index($parameters);
   }

   public function __call($method, $parameters)
   {
     $data['error'] = "Trying to access undefined method {$method}";
     return new View('404', $data);
   }
 }
