<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 21:25 PM
 *
 */
 // namespace controllers

 class User_Controller extends Controller
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
     $user = new User_Model;
     $uniq_id = uniqid();

     $user->id_no = $formdata['id_no'];
     $user->name  = $formdata['name'];
     $user->email = $formdata['email'];
     $user->phone = $formdata['phone'];
     $user->secret = Hash::password($uniq_id);

     //  Create new user
     $user = $user->save();
     if (!$user) {
       // TODO: Send secret to user phone Here {$user->sendSecret()}
       $errors = Session::get('errors');
       return Response::json($errors['db_errors'], 500);
     }
     // create complian for the user
     $complain = new Complain_Model;

     $complain->user_id = $user->id;
     $complain->description = $formdata['description'];

     $complain = $complain->save();
     if (!$complain) {
       $errors = Session::get('errors');
       return Response::json($errors['db_errors'], 500);
     }
     return new Response('Your Complain has been Recieved. Get back to you soon!', 200);
   }
 }
