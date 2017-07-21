<?php

// Page Header
require_once "views/templates/header.php";
?>
<!-- Page content -->
<div class="container" style="height: 80%; margin-top: 30px;">
  <? require_once "views/messages/errors.php"; ?>
  <div class="row">
    <div class="col-md-3" style="">
      <div class="profile-container">
        <div class="profile-details">
          <h5 class="account-name"><? echo  $admin->name; ?> <span class="online"> (Admin)</span></h5> 
          <span class="account-actions">
            <span ><? echo  $admin->phone; ?> &nbsp; </span>
            <a><? echo  $admin->email; ?></a>
          </span>
        </div>
      </div>
      <div class="list-group">
        <a href="#" class="list-group-item active">Darshboard </a>
        <a href="#" class="list-group-item" data-toggle="modal" data-target="#complainModal">New Complains</a>
        <a href="#" class="list-group-item">Complains</a>
        <a href="#" class="list-group-item">Manage Agents</a>
        <a href="#" class="list-group-item">Manage Users</a>
      </div>
      <a class="btn btn-primary" style="width: 100%;" href="#">Log Out</a>
      <!-- <a class="btn btn-danger" id="deleteProfile" style="width: 100%; margin-top: 20px;" href="#">Delete Profile</a> -->
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Admin Dashboard</h4>
        </div>
        <div class="panel-body">

        </div>
      </div>
    </div>

  </div>
</div>

<!-- page Footer -->
<?
require_once "views/templates/footer.php";
?>
<script type="text/javascript">
$('body').addClass('body-background');

$('.list-group-item').click(function(){
  $('.list-group-item').removeClass('active');
  $(this).addClass('active')
})
</script>
