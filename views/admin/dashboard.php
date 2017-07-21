<?php

// Page Header
require_once "views/templates/header.php";
?>
<!-- Page content -->
<div class="container" style="height: 80%; margin-top: 30px;">
  <? require_once "views/messages/errors.php"; ?>
  <div class="row">
    <div class="col-md-3" style="">
      <? require_once "views/admin/admin-sidebar.php"; ?>
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Admin Dashboard</h4>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <h2><? echo $data['complains'];?></h2>
                <hr>
                <p>Recieved Complains</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <h2><? echo $data['responses'];?></h2>
                <hr>
                <p>Responses Made</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <h2><? echo $data['users'];?></h2>
                <hr>
                <p>Total Users</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <h2><? echo $data['agents'];?></h2>
                <hr>
                <p>Registered Agents</p>
              </div>
            </div>


            <div class="col-md-4">
              <div class="card">
                <h2><? echo $data['unassigned'];?></h2>
                <hr>
                <p>Unassigned Issues</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <h2><? echo $data['solved'];?></h2>
                <hr>
                <p>Solved</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <h2><? echo $data['made_today'];?></h2>
                <hr>
                <p>Made Today</p>
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
