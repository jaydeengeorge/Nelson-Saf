<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 22:59 PM
 *
 */
 // Page Header
 require_once "views/templates/header.php";
 ?>

 <!-- Page content -->
 <div class="auth_container row">
   <? require 'views/messages/errors.php'; ?>
   <div class="panel panel-default">
     <div class="panel-heading">
       Register
     </div>
     <div class="panel-body">
       <form class="form-horizontal" id="register-form" action=<? echo SITE_URL."/register"; ?> method="post">
         <div class="form-group">
           <label class="control-label col-md-4" for="f_name">First Name: </label>
           <div class="col-md-6">
             <input class="form-control" type="text" name="f_name" id="f_name" value="">
           </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-4" for="l_name">Last Name: </label>
           <div class="col-md-6">
             <input class="form-control" type="text" name="l_name" id="l_name" value="">
           </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-4" for="email">Email: </label>
           <div class="col-md-6">
             <input class="form-control" type="text" name="email" id="email" value="">
           </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-4" for="password">Password:</label>
           <div class="col-md-6">
             <input class="form-control" type="password" name="password" id="password" value="">
           </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-4" for="confirm_password">Confirm Password:</label>
           <div class="col-md-6">
             <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="">
           </div>
         </div>

         <div class="form-group">
           <div class="col-md-8 col-md-offset-4">
             <button class="btn btn-primary" type="submit" form="register-form" name="register">Register</button>
           </div>
         </div>
       </form>
     </div>
     <div class="panel-footer">
       <div class="">
         <span>Already Have an Account? &nbsp; <a class="" href=<? echo SITE_URL."/login";?> >Login</a></span>
       </div>
     </div>
   </div>
 </div>

 <?

 // page Footer
 require_once "views/templates/footer.php";
 ?>
