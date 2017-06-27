<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 00:25 AM
 *
 * Project Entry
 */
 // use classes\Route;
 // use classes\View;
 // use controllers\HomeController;

 require 'core/init.php';

 require_once 'core/web.php';

 // Accesed path in browser and remove trailling slashes
 $uri = $_SERVER['PATH_INFO'];

 // Url FROM
 $uri_prev = $_SERVER['HTTP_REFERER'];

 // Request method GET/POST
 $request_method = $_SERVER['REQUEST_METHOD'];

 // Query string f exists
 $query_str = $_SERVER['QUERY_STRING"'];

 // Get all registered GET routes
 $routes = Route::getAll($request_method);

 Session::setpreviousUrl($uri_prev);

 // Mnually add a slash at the begining
 if ($uri == '') {
   $uri = '/';
 }else{
   // Remove trailling slashes
   $uri = trim($uri, '/');
   // Manually add a slash at the begining
   $uri = '/'.$uri;
 }

 if (!array_key_exists($uri, $routes)) {
   $data['title'] = "Not Found";
   $data['error'] = "Route {$uri} Not Found";

   return new View('404', $data);
 }else {
   $action = explode('@', $routes[$uri]);
   $controller = new $action[0]($action[1]);
 }
