<div class="">
<? if (Session::has('errors')): ?>
  <div class="alert alert-danger">
    <?
    foreach (Session::get('errors') as $key => $value) {
      echo "<li>{$value}</li>";
    }
    ?>
  </div>
<? endif; ?>
</div>
