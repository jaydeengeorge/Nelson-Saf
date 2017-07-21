<?php
// User sidebar menu + Details
 ?>
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
  <a href=<? echo SITE_URL."/user/dashboard" ?> class="list-group-item active">
    Darshboard<span class="glyphicon glyphicon-home pull-right"></span></a>
  <a href="#" class="list-group-item" data-toggle="modal" data-target="#complainModal">
    Response<span class="glyphicon glyphicon-message pull-right"></span></a>
  <a href="#" class="list-group-item" data-toggle="modal" data-target="#complainModal">
    New Complains<span class="glyphicon glyphicon-plus pull-right"></span></a>
  <a id="prev-complain" href=<? echo SITE_URL."/user/previous-complains" ?> class="list-group-item">
    Previous Complains<span class="glyphicon glyphicon-message pull-right"></a>
  <a href="#" class="list-group-item">
    Setting<span class="glyphicon glyphicon-settings pull-right"></a>
</div>
<a class="btn btn-success" id="editProfile" style="width: 100%;" href="#">Edit Profile</a>
