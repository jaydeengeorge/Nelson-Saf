<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 22:28 PM
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
       Log In
     </div>
     <div class="panel-body">
       <form class="form-horizontal" id="login-form" action=<? echo SITE_URL."/login"; ?> method="post">
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
           <!-- <label class="control-label col-md-4" for="remember_me">Remember me:</label> -->
           <div class="col-md-6 col-md-offset-4">
             <input type="checkbox" name="remember_me"  id="remember_me" value=""> Remember me
           </div>
         </div>

         <div class="form-group">
           <div class="col-md-8 col-md-offset-4">
             <button class="btn btn-primary" type="submit" form="login-form" name="login">Login</button>
           </div>
         </div>
       </form>
     </div>
     <div class="panel-footer">
       <div class="">
         <span>Don't Have an Account? &nbsp; </span><a class="" href=<? echo SITE_URL."/register";?> >Register Here</a>
       </div>
     </div>
   </div>
 </div>


 <?

 // page Footer
 require_once "views/templates/footer.php";
 ?>
