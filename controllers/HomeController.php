<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:25 PM
 *
 */
namespace controllers;

use classes\View;
use classes\Redirect;
use classes\Session;

class HomeController extends Controller
{
  // Implemet parent contructor
  function __construct($method, $parameters = null)
  {
    parent::__construct($method, $parameters);
  }

  // Loading the home view
  public function index()
  {
    $data['title'] = "Home";

    if (Session::has('user')) {
      return Redirect::to('/user/dashboard');
    }
    return new View('welcome', $data);
  }
}
