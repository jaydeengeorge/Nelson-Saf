<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time: 01:43 AM
 */
if (!session_id()) {
  session_start();
}

// Loading configuration
require_once 'config/app.php';
require_once 'config/database.php';

// Dynamically loading classes, controllers && models
spl_autoload_register(function ($class){
  $class = str_replace('\\', '/', $class) . '.php';
  // echo $class;
  require_once $class;
});
