<?php
/**
 * Author: <jomwashighadi@gmail.com>
 * Date: 067/10/17
 * Time : 02:59 AM
 *
 */
 namespace controllers;

 use classes\Redirect;
 use classes\Session;
 use classes\View;

 class AdminController extends Controller
 {
   function __construct($method, $parameters = null)
   {
     if (Session::has('user') && Session::get('user')->user_type == 'super') {
       return parent::__construct($method, $parameters);
     }
     $errors = ['error'=> "Access Denied!!!"];
     Session::put('errors', $errors);
     return Redirect::to('/');
   }

   public function index()
   {
     return new View('admin.dashboard');
   }
 }
