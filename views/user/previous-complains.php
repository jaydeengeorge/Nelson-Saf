<?php
// List all Previos complain user made

// Page Header
require_once "views/templates/header.php";
?>
<!-- Page content -->
<div class="container" style="height: 80%; margin-top: 30px;">
  <? require_once "views/messages/errors.php"; ?>
  <div class="row">
    <div class="col-md-3" style="">
      <? require_once 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Previous Complains</h4>
        </div>
        <table class="table table-bordered panel-body">
          <thead>
            <tr>
              <th>Id</th>
              <th>Description</th>
              <th>Agent</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <? foreach ($data['complains'] as $complain): ?>
            <tr>
              <td><? echo $complain->id; ?></td>
              <td><? echo $complain->description; ?></td>
              <td><? echo $complain->assigned_to; ?></td>
              <td><? echo $complain->created_at; ?></td>
              <td>
                <a href="#" class="btn btn-danger btn-delete">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
            <? endforeach;?>
          </tbody>
        </table>
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
$('.list-group-item').removeClass('active');
$('#prev-complain').addClass('active');


$('.list-group-item').click(function(){
  $('.list-group-item').removeClass('active');
  $(this).addClass('active')
})
</script>
