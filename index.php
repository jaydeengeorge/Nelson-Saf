<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 00:25 AM
 *
 * Project Entry
 */

 require 'core/init.php';
// TODO: Implement method in controllers
function getView()
{
  $data['title'] = "Testing View";
  $data['test'] = $_SERVER['REQUEST_URI'];
  return new View($data,"home");
}
getView();
