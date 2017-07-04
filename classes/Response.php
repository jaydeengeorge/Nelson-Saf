<?php
/**
 * User: reaper45
 * Date: 6/28/17
 * Time: 00:24 AM
 *
 * Lincence: [MIT license]
 */
 /*
 |--------------------------------------------------------------------------
 | Class Response
 |--------------------------------------------------------------------------
 |
 | Customizing http responses return by the app.
 | ....eg stsus code, headers etc
 |
 */
 namespace classes;

 class Response
 {

   // New Response
   function __construct($message, $response_code)
   {
     //  header('Content-type: application/json');
     http_response_code($response_code);
     echo json_encode($message);
     exit();
   }

   // Return Json response
   public static function json($message, $response_code)
   {
     header('Content-type: application/json');
     http_response_code($response_code);
     echo json_encode($message);
     exit();
   }
 }
