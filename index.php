<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 00:25 AM
 *
 * Project Entry
 */

 require 'core/init.php';

 // Accesed path in browser
 $uri = $_SERVER['PATH_INFO'];

 // Request method GET/POST
 $method = $_SERVER['REQUEST_METHOD'];

 // Query string f exists
 $query_str = $_SERVER['QUERY_STRING"'];


 // Controller::call($uri)
 function getView()
 {
   $data['title'] = "Testing View";
   $data['test'] = $_SERVER['PATH_INFO'];
   $data['content'] = $_SERVER;
   return new View("home", $data);
 }
 getView();
