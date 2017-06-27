<div class="">
<!-- <? if (Session::has('errors')): ?> -->
  <!-- <div class="alert alert-danger"> -->
    <?
    echo "<script type='text/javascript'>
     $.notify('boom', 'error');
     </script>";

    // foreach (Session::get('errors') as $key => $value) {
    //   echo "<script type='text/javascript'>
    //    $.notify('Booom bang', 'error');
    //    </script>";
    //  }
   ?>
  <!-- </div> -->
<!-- <? endif; ?> -->
</div>
