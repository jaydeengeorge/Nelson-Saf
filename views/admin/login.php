<?php

// Page Header
require_once "views/templates/header.php";
?>
<!-- Page content -->
<div class="container" style="height: 80%; margin-top: 30px;">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <? require_once "views/messages/errors.php"; ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Admin Login</h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" id="adminLogin" action="<? echo SITE_URL."/admin/authenticate"; ?>" method="post">
            <div class="form-group">
              <label for="username" class="form-label">Username</label>
              <input id="username" class="form-control" type="text" name="username" >
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input id="password" class="form-control" type="password" name="password" >
            </div>
          </form>
        </div>
        <div class="panel-footer text-right">
          <button class="btn btn-primary" type="submit" form="adminLogin" name="button">Login</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- page Footer -->
<?
require_once "views/templates/footer.php";
?>
