<? if (classes\Session::has('errors')): ?>
    <div class="alert alert-danger">
      <ul>
        <?
        foreach (classes\Session::get('errors') as $value) {
          echo "<li>{$value}</li>";
         }
       ?>
     </ul>
  </div>
<? endif; ?>
