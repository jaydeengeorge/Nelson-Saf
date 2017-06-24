<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 20:59 PM
 *
 */
 // Page Header
 require_once "templates/header.php";
 ?>

 <!-- Page content -->

 <h1>404 Error. </h1>

 <h3>Page Not Found!</h3>

 <?

 echo "<h4>".$data['url']."</h4>";
 var_dump($data['content']);


 // page Footer
 require_once "templates/footer.php";
 ?>
