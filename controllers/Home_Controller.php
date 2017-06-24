<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:25 AM
 *
 */
// namespace controllers;

class Home_Controller
{

  function __construct()
  {
    // parent::__construct();
  }

  public function index()
  {

    $data['title'] = "Testing View";
    $data['test'] = $_SERVER['PATH_INFO'];
    $data['content'] =  $routes = Route::all('get');

    return new View("home", $data);
  }
}
