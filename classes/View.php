<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 01:17 AM
 */
 // namespace classes;

class View
{
  // View directory name
  protected $viewdir = "views/";

  function __construct($path, $data = null)
  {
    if (strchr($path, '.')) {
      $path = str_replace('.', '/', $path);
    }
    require_once $this->viewdir."{$path}.php";
  }
}


/**
* Class view complete as by: 01:23 AM
* Do Not Modify this Infomation.
*/
