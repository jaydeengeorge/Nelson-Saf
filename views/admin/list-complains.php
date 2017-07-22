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
                <td><a href="<?echo SITE_URL.'/user/profile?id='.$complain->user_id; ?>" >
                  <? echo explode(' ', models\Users::where(['id',$complain->user_id])->name)[0]; ?></a>
                </td>
                <td class="text-center">
                  <span class="label label-success"></span>
                  <? echo $complain->assigned_to ?
                  "<span class='label label-success'>".models\Agents::where(['id',$complain->assigned_to])->username."</span>" :
                  "<span class='label label-danger assign-to' value='{$complain->id}'>Assign agent</span>"; ?>
                </td>

                <td><? echo $complain->created_at; ?></td>
                <td class="text-center">
                  <a href="#" value="<? echo $complain->id; ?>" class="btn btn-danger btn-delete">
                    <span style="font-size: 0.9em;" class="glyphicon glyphicon-trash"></span>
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

  <!-- Agents List Modal -->
  <div class="modal fade" id="agentsModal" tabindex="-1" role="dialog" aria-labelledby="agentsModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          Select Agent To Assign
        </div>
        <div class="modal-body">
          <ul id="agent_list">

          </ul>
        </div>
      </div>
    </div>
  </div>

  <?
  require_once "views/templates/footer.php";
  ?>
