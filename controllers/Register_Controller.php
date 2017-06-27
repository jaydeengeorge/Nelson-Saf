<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 21:39 PM
 *
 */
 // namespace controllers

 class Register_Controller extends Controller
 {

   function __construct($metod)
   {
     parent::__construct($metod);
   }

   // Register View
   public function index()
   {
     $data['title'] = 'Register';
     return new View('auth.register', $data);
   }

   // Register  a new user
   public function register()
   {
     // Get form data
     $formdata = Input::all();

     // Validate Input data
     $validator = new Validator;

     $validate = $validator->make($formdata,[
       'f_name'=>'required',
       'l_name'=>'required',
      //  'phone'=>'required|min:10',
       'email'=>'required|email',
       'password'=>'required|min:6'
     ]);

     // If errors exists redirect back
     if ($validator->fails()) {
       $errors = $validator->errors();

       Session::put('errors', $errors);
       return Redirect::back();
     }

     $user = new Model_User;

     $user->f_name   = $formdata['f_name'];
     $user->l_name   = $formdata['l_name'];
     $user->email    = $formdata['email'];
     $user->password = Hash::password(Input::post('password'));

     return Model_User::create($user);
   }
 }
