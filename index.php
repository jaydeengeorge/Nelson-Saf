<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 00:25 AM
 */

 require 'core/init.php';

 require_once 'core/web.php';

 // Accesed path in browser and remove trailling slashes
 $current_uri = $_SERVER['PATH_INFO'];

 // Url FROM
 $prev_uri = $_SERVER['HTTP_REFERER'];

 // Request method GET/POST
 $request_method = $_SERVER['REQUEST_METHOD'];

 // Query string f exists
 $query_str = $_SERVER['QUERY_STRING"'];

 $app = new classes\Bootstrap($current_uri, $request_method, $prev_uri ,$query_str);
