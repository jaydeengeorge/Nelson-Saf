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
use models\User;

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
   $user_to_auth = User::where(['email', $user->email]);

   if ($user_to_auth) {
     $password = Hash::password($user->password);

     if ($user_to_auth->password == $password) {
       Session::put('user', $user);
       return true;
     }
     $errors = ['error' => 'Invalid Email Password Combination!'];
     Session::put('errors', $errors);

     return true;
   }
   return false;
 }
}
