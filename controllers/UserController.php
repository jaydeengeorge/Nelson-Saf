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

   function __construct($metod)
   {
     parent::__construct($metod);
   }

   public function launchComplain()
   {
     // Get form data
     $formdata = Input::all();

     // Validate Input data
     $validator = new Validator;

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
       return Response::json($errors['db_errors'], 500);
     }
     // create complian for the user
     $complain = new Complain;

     $complain->user_id = $user->id;
     $complain->description = $formdata['description'];

     $complain = $complain->save();
     if (!$complain) {
       $errors = Session::get('errors');
       return Response::json($errors['db_errors'], 500);
     }
     // Log in user Here
     return new Response('Your Complain has been Recieved. Get back to you soon!', 200);
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

   public function test()
   {
     var_dump(Session::all()); exit();
   }
 }
