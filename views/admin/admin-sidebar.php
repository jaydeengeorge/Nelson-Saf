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
    <a href="<? echo SITE_URL."/admin/list-complains"?>" class="list-group-item">
      Complains<span class="glyphicon glyphicon-exclamation-sign pull-right"></span></a>
    <a href="#" class="list-group-item">
      Manage Agents<span class="glyphicon glyphicon-briefcase pull-right"></span></a>
    <a href="#" class="list-group-item">
      Manage Users<span class="glyphicon glyphicon-user pull-right"></span></a>
  </div>
</div>
<a class="btn btn-primary" style="width: 100%;" href="<? echo SITE_URL.'/admin/logout'?>">
  Log Out</a>
