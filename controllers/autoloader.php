<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time: 20:43 AM
 */

 // Dynamically loading controllers
 spl_autoload_register(function ($controller){
     require_once $controller.'.php';
 });
