<?php

// Page Header
require_once "views/templates/header.php";
?>
<!-- Page content -->
<div class="container" style="height: 80%; margin-top: 30px;">
  <? require_once "views/messages/errors.php"; ?>
  <div class="row">
    <div class="col-md-3">
      <? require_once 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>User Dashboard</h4>
        </div>
        <div class="panel-body text-center">

          <span class="fa-3x glyphicon glyphicon-exclamation-sign"></span>
          <h3>We are working on your Feedback!</h3>
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
