<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 00:25 AM
 *
 * Project Entry
 */

function getView()
{
  $data['title'] = "Testing View";
  return new View($data,"views/templates/header");
}
getView();
