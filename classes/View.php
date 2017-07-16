<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 01:17 AM
 */
  namespace classes;

  use classes\Session;

  class View
  {
    // View directory name
    protected $viewdir = "views/";

    function __construct($path, $data = null)
    {
      $user = !Session::has('user') ?:Session::get('user'); // Pass user to view if signed-in

      if (strchr($path, '.')) {
        $path = str_replace('.', '/', $path);
      }
      require_once $this->viewdir."{$path}.php";
    }

  }
