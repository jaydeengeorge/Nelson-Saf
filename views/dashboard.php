<?php

session_start();
// Page Header
require_once "templates/header.php";
?>
<!-- Page content -->
<div class="container" style="height: 80%; margin-top: 30px;">

  <div class="row">
    <div class="col-md-3" style="">
      <div class="profile-container">
        <div class="account-avatar">
          <img class="img-responsive" src=<? echo BASE_URL."/assets/img/avatar.png"; ?> alt="Profile Pic.">
        </div>
        <div class="profile-details">
          <h5 class="account-name"><? echo  $user->name; ?></h5>
          <hr style="margin-bottom: 15px;"/>
          <span class="account-actions">
            <span ><? echo  $user->phone; ?></span><br/>
            <a><? echo  $user->email; ?></a>

          </span>
        </div>
      </div>
      <div class="list-group">
        <a href="#" class="list-group-item active">Darshboard </a>
        <a href="#" class="list-group-item">Previous Complains</a>
        <a href="#" class="list-group-item">Setting</a>
      </div>
      <a class="btn btn-success" id="editProfile" style="width: 100%;" href="#">Edit Profile</a>
      <!-- <a class="btn btn-danger" id="deleteProfile" style="width: 100%; margin-top: 20px;" href="#">Delete Profile</a> -->
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Dashboard</h4>
        </div>
        <div class="panel-body">

        </div>
      </div>
    </div>

  </div>
</div>

<!-- page Footer -->
<?
require_once "templates/footer.php";
?>
<script type="text/javascript">
$('body').addClass('body-background');

$('.list-group-item').click(function(){
  $('.list-group-item').removeClass('active');
  $(this).addClass('active')
})
</script>
