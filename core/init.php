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

// Dynamically load helper classes
spl_autoload_register(function ($class){
  if (strchr($class, '_')){
    $split = explode('_', $class);

    if ($split[1] == 'Controller') {
      require_once 'controllers/'.$class.'.php'; // Load controllers
    }
    elseif ($split[1] == 'Model') {
      require_once 'models/'.$class.'.php'; // Load models
    }
  }else{
    // Load class from classes dir
    require_once 'classes/'.$class.'.php';
  }

});
