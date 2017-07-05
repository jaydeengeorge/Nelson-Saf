<?php
/**
 * User: reaper45
 * Date: 6/28/17
 * Time: 01:08 AM
 *
 * Lincence: [MIT license]
 */
 /*
 |--------------------------------------------------------------------------
 | Class Bootstrap
 |--------------------------------------------------------------------------
 |
 |Bootstraping the application
 |
 */
 namespace classes;

 use classes\Sessions;
 use classes\Route;
 use classes\View;
 use controllers\auth\LoginController;
 use controllers\auth\RegisterController;
 use controllers\Controller;
 use controllers\HomeController;
 use controllers\UserController;

 class Bootstrap
 {

   function __construct($current_uri, $request_method = 'GET', $uri_prev = null, $query_str = null)
   {
     // Get all registered GET routes
     $routes = Route::getAll($request_method);

     // Set previous Url
     Session::setpreviousUrl($uri_prev);

     // Mnually add a slash at the begining
     if ($current_uri == '') {
       $current_uri = '/';
     }else{
       // Remove trailling slashes
       $current_uri = trim($current_uri, '/');
       // Manually add a slash at the begining
       $current_uri = '/'.$current_uri;
     }

     if ($this->isAllowedUrl($current_uri, $routes)) {
       $action = explode('@', $routes[$current_uri]);
       $classname = 'controllers\\'.$action[0];

       return new $classname($action[1]);
     }
     $data['title'] = "Not Found";
     $data['error'] = "Route {$uri} Not Found";

     http_response_code(404);
     return new View('404', $data);
   }

   // Check accessed Url is in routes
   public function isAllowedUrl($uri, $routes)
   {
     if (array_key_exists($uri, $routes)) {
        return true;
      }
      return false;
   }
 }
