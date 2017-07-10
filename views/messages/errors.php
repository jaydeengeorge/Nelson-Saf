<? if (classes\Session::has('errors')): ?>
    <div class="alert alert-danger">
    <?
    foreach (classes\Session::get('errors') as $value) {
      echo $value;
     }
   ?>
   <button style="margin-top:-3px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span></button></li>
  </div>
<? endif; ?>
