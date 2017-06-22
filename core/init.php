<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time: 01:43 AM
 */
session_start();

// Loading configuration
require_once 'config/app.php';
require_once 'config/database.php';

// Dynamically loading classes
spl_autoload_register(function ($class){
    require_once 'classes/'.$class.'.php';
});
