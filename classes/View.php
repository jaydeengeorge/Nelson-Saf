<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 01:17 AM
 */

// creating new views
class View
{
  // View directory name
  protected $viewdir = "views/";

  function __construct($data, $path)
  {
    require_once $this->viewdir."{$path}.php";
  }
}


/**
* Class view complete as by: 01:23 AM
* Do Not Modify this Infomation.
*/
