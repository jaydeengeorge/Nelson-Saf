<?php
/**
* Created by Atom.
* User: reaper45
* Date: 06/23/17
* Time : 00:40 AM
*
* Footer for every page in this project.
*/
?>


<!-- </div> -->
<!-- End container -->
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
            <input class="form-control" type="text" name="id_no" id="id_no" value="<? echo $user->id_no;?>" placeholder="Your ID card NO." >
          </div>
          <? if (!classes\Session::has('user')): ?>
          <div class="form-group">
            <label class="control-label" for="phone">Phone: </label><span class="required">*</span>
            <input class="form-control" type="number" min="0" name="phone" id="phone" value="<? echo $user->phone;?>" placeholder="Your phone Number.">
          </div>

          <div class="form-group">
            <label class="control-label" for="name">Full Name: </label><span class="required">*</span>
            <input class="form-control" type="text" name="name" id="name" value="<? echo $user->name;?>" placeholder="Full names as in your ID Card." >
          </div>

          <div class="form-group">
            <label class="control-label" for="email">Email: </label>
            <input class="form-control" type="text" name="email" id="email" value="<? echo $user->email;?>" placeholder="Email Address (Optional)">
          </div>
        <? endif;?>

        <div class="form-group">
          <label class="control-label" for="description">Complain Description: </label><span class="required">*</span>
          <textarea class="form-control" type="text" name="description" id="description" placeholder="Describe your complain briefly" ></textarea>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" form="complain-form" name="register">Submit Complain</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Page Footer -->
<div class="footer">
  <footer>
    <p class="text-center">&copy; &nbsp;<? echo date(Y)."&nbsp; ".APP_AUTHOR." &nbsp;- &nbsp;".APP_NAME; ?> &nbsp;</p>
  </footer>
</div>

<!-- End footer -->


<!-- Scripts -->
<script type="text/javascript">

</script>
<!-- Jquery -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/jquery.js"></script>
<!-- Bootstrap js -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
<!-- Notify js -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/notify.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/master.js"></script>

</body>
</html>
<?
if (classes\Session::has('errors')) {
  classes\Session::forget('errors');
}

?>
