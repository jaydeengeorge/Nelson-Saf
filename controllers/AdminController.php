<?php
/**
 * Author: <jomwashighadi@gmail.com>
 * Date: 067/10/17
 * Time : 02:59 AM
 *
 */
 namespace controllers;

 use controllers\auth\LoginController;
 use classes\DB;
 use classes\Hash;
 use classes\Input;
 use classes\Redirect;
 use classes\Session;
 use classes\Validator;
 use classes\View;
 use models\Admins;
 use models\Users;

 class AdminController extends Controller
 {

   public $errors = ['error'=> "Access Denied!!!"];

   function __construct($method, $parameters = null)
   {
     return parent::__construct($method, $parameters);
   }

   public function check()
   {
     if (Session::has('admin')) {
       return true;
     }
     return false;
   }

   public function index()
   {
     if (!$this->check()) {
       return Redirect::to('admin/login');
     }
     $db = new DB;
     $data['complains'] = $db->table('complains')->all()->count();
     $data['users'] = $db->table('users')->all()->count();
     $data['agents'] = 52;
    //  $data['agents'] = $db->table('agents')->all()->count();
    
     return new View('admin.dashboard', $data);
   }

   public function getLogin()
   {
    //  if (Session::has('admin')) {
    //    return $this->index();
    //  }
     return new View('admin.login');
   }

   public function authenticate()
   {
     $formdata = Input::all();
     // Validate Input data
     $validator = new Validator;
     $validate = $validator->make($formdata,[
       'username'=>'required',
       'password'=>'required'
     ]);

     // If errors exists redirect back
     if ($validator->fails()) {
       $errors = $validator->errors();
       Session::put('errors', $errors);

       return Redirect::to('/admin/login');
     }
     $admin = new Admins;

     $admin->username = $formdata['username'];
     $admin->password = Hash::password($formdata['password']);

     if (LoginController::adminAuthenticate($admin)) {
       return Redirect::to('/admin');
     }
     $errors = Session::get('errors');
     return Redirect::to('/admin/login');
   }

   // Logout the Admin
   public function logout()
   {
     if (Session::has('amdin')) {
       Session::forget('admin');
     }
     return Redirect::to('/');
   }
 }
