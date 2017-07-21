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
        <div class="">
          <h5 class=""><? echo  $admin->name; ?> <span class="online"> (Admin)</span></h5>
          <span class="account-actions">
            <span ><? echo  $admin->phone; ?> &nbsp; </span>
            <a><? echo  $admin->email; ?></a>
          </span>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          Darshboard <span class="glyphicon glyphicon-dashboard pull-right"></span>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item" data-toggle="modal" data-target="#complainModal">
            New Complains<span class="glyphicon glyphicon-plus pull-right"></span></a>
          <a href="#" class="list-group-item">
            Complains<span class="glyphicon glyphicon-exclamation-sign pull-right"></span></a>
          <a href="#" class="list-group-item">
            Manage Agents<span class="glyphicon glyphicon-briefcase pull-right"></span></a>
          <a href="#" class="list-group-item">
            Manage Users<span class="glyphicon glyphicon-user pull-right"></span></a>
        </div>
      </div>
      <a class="btn btn-primary" style="width: 100%;" href="<? echo SITE_URL.'/admin/logout'?>">
        Log Out</a>
      <!-- <a class="btn btn-danger" id="deleteProfile" style="width: 100%; margin-top: 20px;" href="#">Delete Profile</a> -->
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Admin Dashboard</h4>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <h2><? echo $data['complains'];?></h2>
                <hr>
                <p>Recieved Complains</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <h2><? echo $data['users'];?></h2>
                <hr>
                <p>Total Users</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <h2><? echo $data['agents'];?></h2>
                <hr>
                <p>Registered Agents</p>
              </div>
            </div>
          </div>
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
