<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 02:29 AM
 *
 */
 session_start();
 // Page Header
 require_once "templates/header.php";
?>
 <!-- Page content -->
 <div class="container" style="height: 80%;">
   <!-- <div class="panel panel default">
     <div class="panel-heading">
       <h4>Dashboard</h4>
     </div>
     <div class="panel-body">

     </div>
   </div> -->
   <div class="row">
     <div class="col-md-3">
       <div class="list-group">
         <img class="img-responsive profile-pic" src=<? echo BASE_URL."/assets/img/avatar.png"; ?> alt="Profile Pic.">

         <a href="#" class="list-group-item"><label>Name:&nbsp;</label><? echo  $user->name; ?>(Admin)</a>
         <!-- <a href="#" class="list-group-item"> </a> -->
         <a href="#" class="list-group-item"><label>Phone:&nbsp;</label><? echo  $user->phone; ?></a>
         <a href="#" class="list-group-item"><label>Email:&nbsp;</label><? echo  $user->email; ?></a>
         <a class="btn btn-success" id="editProfile" style="width: 100%;" href="#">Edit Profile</a>
       </div>
       <a class="btn btn-danger" id="deleteProfile" style="width: 100%; margin-top: 20px;" href="#">Delete Profile</a>
     </div>
     <div class="col-md-9">

     </div>

   </div>
 </div>

 <!-- page Footer -->
 <?
 require_once "templates/footer.php";
?>
