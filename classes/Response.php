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

 class Response
 {
   // New Response
   function __construct($message, $status_code)
   {
    //  header('Content-type: application/json');
     echo json_encode($message);
     exit();
   }

   // Return Json response
   public static function json($message, $status_code)
   {
     header('Content-type: application/json');
     echo json_encode($message);
     exit();
   }
 }
