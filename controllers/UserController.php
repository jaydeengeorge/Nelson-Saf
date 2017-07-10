<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 21:25 PM
 *
 */
 namespace controllers;

 use controllers\auth\LoginController;
 use classes\Hash;
 use classes\Input;
 use classes\Redirect;
 use classes\Response;
 use classes\Session;
 use classes\Validator;
 use classes\View;
 use models\User;
 use models\Complain;

 class UserController extends Controller
 {

   function __construct($metod, $paremeters = null)
   {
     parent::__construct($metod, $paremeters);
   }

   public function launchComplain()
   {
     // Get form data
     $formdata = Input::all();

     // Validate Input data
     $validator = new Validator;

     if (!Session::has('user')) {
       $validate = $validator->make($formdata,[
         'id_no'=>'required|min:10',
         'name'=>'required',
         'phone'=>'required',
         'description'=>'required' // Max validation not working for now (max:250)
       ]);
       // If errors exists redirect back
       if ($validator->fails()) {
         $errors = $validator->errors();

        return Response::json($errors, 422);
       }

       $user_id = $this->createUser($formdata);
       if ($user_id == false) {
         return Response::json($errors['db_errors'], 500);
       }
     }else{
       $validate = $validator->make($formdata,[
         'id_no'=>'required|min:10',
         'description'=>'required' // Max validation not working for now (max:250)
       ]);
       // If errors exists redirect back
       if ($validator->fails()) {
         $errors = $validator->errors();

        return Response::json($errors, 422);
       }
       $user_id = Session::get('user')->id;
     }

     // create complian for the user
     if ($this->createComplain($formdata, $user_id)) {
       // TODO: Log in user Here
       return new Response('Your Complain has been Recieved. Get back to you soon!', 200);
     }
   }

   public function authenticate()
   {
     // Get form data
     $formdata = Input::all();

     // Validate Input data
     $validator = new Validator;
     $validate = $validator->make($formdata,[
       'phone'=>'required',
       'secret'=>'required'
     ]);

     // If errors exists redirect back
     if ($validator->fails()) {
       $errors = $validator->errors();

       return Response::json($errors, 422);
     }
     $user = new User;
     $user->phone = $formdata['phone'];
     $user->secret = Hash::password($formdata['secret']);

     if (LoginController::authenticate($user)) {
       return new Response('', 200);
     }
     $errors = Session::get('errors');
     return Response::json($errors, 422);
   }

   // User Darshboard
   public function getUserDashboard()
   {
     if (Session::has('user')) {
       return new View('dashboard');
     }
     return Redirect::to('/');
   }

   public function createUser($formdata)
   {
     $user = new User;
     $uniq_id = uniqid();

     $user->id_no = $formdata['id_no'];
     $user->name  = $formdata['name'];
     $user->email = $formdata['email'];
     $user->phone = $formdata['phone'];
     $user->secret = Hash::password($uniq_id);
     $user->val =  $uniq_id; // To be removed

     //  Create new user
     $user = $user->save();
     if (!$user) {
       // TODO: Send secret to user phone Here {$user->sendSecret()}
       $errors = Session::get('errors');
       return false;
     }
     return $user->id;
   }

   public function createComplain($formdata, $user_id)
   {
     $complain = new Complain;

     $complain->user_id = $user_id;
     $complain->description = $formdata['description'];

     $complain = $complain->save();
     if (!$complain) {
       $errors = Session::get('errors');
       return false;
     }
     return true;
   }
   // Logout the User
   public function logout()
   {
     if (Session::has('user')) {
       Session::forget('user');
     }
     return Redirect::to('/');
   }


   // Just a stupid test
   public function test()
   {
     var_dump(Session::all()); exit();
   }
 }
