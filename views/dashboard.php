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
   <div class="panel panel default">
     <div class="panel-heading">
       <h4>Dashboard</h4>
     </div>
     <div class="panel-body">
       <? $user = classes\Session::get('user'); ?>
       You are logged in as <? var_dump(classes\Session::all()); ?>
     </div>
   </div>
 </div>

 <!-- page Footer -->
 <?
 require_once "templates/footer.php";
?>
