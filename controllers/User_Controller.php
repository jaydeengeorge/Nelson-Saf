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
       'email'=>'required|email',
       'description'=>'required|max:160'
     ]);

     // If errors exists redirect back
     if ($validator->fails()) {
       $errors = $validator->errors();

      return Response::json($errors, 422);
      // header('Content-type: application/json');
      // echo json_encode($errors);
      exit();
     }
   }
 }
