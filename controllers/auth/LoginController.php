<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 20:35 PM
 *
 */
namespace controllers\auth;

use controllers\Controller;
use classes\Hash;
use classes\Input;
use classes\Redirect;
use classes\Session;
use classes\Validator;
use classes\View;
use models\Users;

class LoginController extends Controller
{

 function __construct($metod)
 {
   parent::__construct($metod);
 }

 // Login form view
 public function index()
 {
   $data['title'] = 'Login';

   return new View("auth.login", $data);
 }

 // Authenticate user (login)
 public static function authenticate($user)
 {
   // Find user with email
   $user_exists = Users::where(['phone', $user->phone]);

   if ($user_exists) {
     $secret = Hash::password($user->secret);
    //  var_dump($user_exists->secret, $secret); exit();

     if ($user_exists->secret == $secret) {
       Session::put('user', $user_exists);
       return true;
     }
   }
   $errors = ['error' => "Invalid Login Credentials!"];
   Session::put('errors', $errors);

   return false;
 }
}
