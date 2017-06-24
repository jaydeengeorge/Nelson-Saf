<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:29 PM
 *
 */
 // namespace controllers;

 class Controller
 {
   function __construct($method)
   {
     $this->$method();
   }

   public function __call($method, $parameters)
   {
     return new Exeption("Trying to access undefined method {$method}");
   }
 }
