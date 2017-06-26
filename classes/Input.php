<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/26/17
 * Time : 04:17 AM
 *
 */


 class Input
 {
   // Get value in POST array by key
   public function post($key)
   {
     if (isset($_POST)) {
       return $_POST[$key];
     }
     return false;
   }
   // Get value in GET array by key
   public function get($key)
   {
     if (isset($_GET)) {
       return $_GET[$key];
     }
     return false;
   }

   // Extract the whole aary
   public function all()
   {
     if(isset($_POST)){
       return $_POST;
     }
   }
 }
