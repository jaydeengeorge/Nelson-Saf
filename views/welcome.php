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
 // require_once "messages/errors.php";

 $errors = classes\Session::get('errors');

 $errors = json_encode($errors);

?>

<!-- Page content -->
<div class="welcome-body">

<div class="main">
  <div class="m-b-md">
    <div class="" style="margin-left: 60px;">
      <h1 class="title ">Something about the complains Here.</h1>
      <div class="complaine-text">Little more explaination here</div>
      <button type="button" class="btn btn-default action-btn" data-toggle="modal" data-target="#complainModal" style="padding: 12px 34px; margin-top: 50px;">
        Launch Complain</button>
    </div>
    <!-- <hr class="line"/> -->
  </div>
</div>

</div>

<!-- Login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Login To Get Feedback.</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="login-form" action=<? echo SITE_URL."/login"; ?> method="post">

          <div class="form-group">
            <label class="control-label" for="phone">Phone: </label><span class="required">*</span>
            <input class="form-control" type="number" min="0" name="phone" id="phone" placeholder="Your phone Number.">
          </div>

          <div class="form-group">
            <label class="control-label" for="secret">Secret: </label><span class="required">*</span>
            <input class="form-control" type="password" name="secret" id="secret" placeholder="Code sent to your phone no." >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="login-form" name="register">Login</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


 <!-- page Footer -->
 <?
 require_once "templates/footer.php";

 $errors = json_encode(classes\Session::get('errors'));
 // foreach ($errors as $key => $value) {
   echo "<script type='text/javascript'>
    $.notify({$errors[1]}, 'error');
    </script>";
 // }

?>
