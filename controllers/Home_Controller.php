<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:25 PM
 *
 */
// namespace controllers;

class Home_Controller extends Controller
{
  // Implemet parent contructor
  function __construct($method)
  {
    parent::__construct($method);
  }

  // Loading the home view
  public function index()
  {
    $data['title'] = "Testing View";
    $data['test'] = $_SERVER['PATH_INFO'];
    $data['content'] =  $routes = Route::getAll('get');

    return new View("home", $data);
  }

}
