<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/24/17
 * Time : 00:10 AM
 *
 */
 // Page Header
 require_once "templates/header.php";
?>

<!-- Page content -->
<div class="main">
  <div class="m-b-md">
    <div class="" style="margin-left: 60px;">
      <h1 class="title ">Something about the complains Here.</h1>
      <div class="complaine-text">Little more explaination here</div>
      <button type="button" ="#" class="btn btn-default action-btn" data-toggle="modal" data-target="#complainModal" style="padding: 12px 34px; margin-top: 50px;">
        Launch Complain</button>
    </div>
    <!-- <hr class="line"/> -->
  </div>
</div>

<!-- Complain modal -->
<div class="modal fade" id="complainModal" tabindex="-1" role="dialog" aria-labelledby="complainModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Launch Complain</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="complain-form" action=<? echo SITE_URL."/complain"; ?> method="post">

          <div class="form-group">
            <label class="control-label" for="id_no">ID NO: </label><span class="required">*</span>
            <input class="form-control" type="text" name="id_no" id="id_no" placeholder="Your ID card NO." required>
          </div>

          <div class="form-group">
            <label class="control-label" for="name">Full Name: </label><span class="required">*</span>
            <input class="form-control" type="text" name="name" id="name" placeholder="Full names as in your ID Card." required>
          </div>

          <div class="form-group">
            <label class="control-label" for="email">Email: </label>
            <input class="form-control" type="text" name="email" id="email" placeholder="Email Address (Optional)">
          </div>

          <div class="form-group">
            <label class="control-label" for="description">Complain Description: </label><span class="required">*</span>
            <textarea class="form-control" type="text" name="description" id="description" placeholder="Describe your complain briefly" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" form="complain-form" name="register">Submit Complain</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <!-- page Footer -->
 <?
 require_once "templates/footer.php";
?>
