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

<!-- Page Footer -->
<footer>
    <p class="text-center">&copy; &nbsp;<? echo date(Y)."&nbsp; ".APP_AUTHOR." &nbsp;- &nbsp;".APP_NAME; ?> &nbsp;</p>
</footer>
<!-- End footer -->


<!-- Scripts -->
<script type="text/javascript">

</script>
<!-- Jquery -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/jquery.js"></script>
<!-- Bootstrap js -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
<!-- Notify js -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/notify.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="<? echo BASE_URL; ?>/assets/js/master.js"></script>

</body>
</html>
<?
if (Session::has('errors')) {
  Session::forget('errors');
}

?>
