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
          <h4>All Complains/ Issues</h4>
        </div>
        <table class="table table-bordered panel-body">
          <thead>
            <tr>
              <th>Id</th>
              <th>Description</th>
              <th>By</th>
              <th>Assign</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <? foreach ($data['complains'] as $complain): ?>
              <tr>
                <td><? echo $complain->id; ?></td>
                <td><? echo $complain->description; ?></td>
                <td><? echo $complain->by; ?></td>
                <td>
                  <span class="label label-success"></span>
                  <? echo $complain->assigned_to ?
                  "<span class='label label-success'>".models\Users::where(['id',$complain->assigned_to])->name."</span>" :
                  "<span class='label label-danger'>Assign agent</span>"; ?>
                </td>

                <td><? echo $complain->created_at; ?></td>
                <td>
                  <a href="#" value="<? echo $complain->id; ?>" class="btn btn-danger btn-delete">
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
