<?php
/**
 * Created by Atom.
 * User: reaper45
 * Date: 06/23/17
 * Time : 00:29 AM
 *
 * Header for every page in this project.
 */
?>

<html>
<head>
    <!-- Page title -->
    <title> <? echo APP_NAME." | ".$data['title']; ?> </title>

    <!-- Css links -->
    <link rel="stylesheet" href="<? echo BASE_URL;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo BASE_URL;?>/assets/css/master.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<? echo BASE_URL;?>/assets/fonts">
    <!-- Icons -->
    <link rel="stylesheet" href="<? echo BASE_URL;?>/assets/css/">

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default">
      <div class="container" style="margin-top: 8px;">
        <div class="navbar-header">
          <!-- Toggle Navigation -->
          <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse" class="navbar-toggle collapsed">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Toggle Navigation -->

          <!-- App brand -->
          <a href="<? echo SITE_URL; ?>" class="navbar-brand">
            <? echo APP_NAME;?>
          </a>
          <!-- Brand -->
        </div>

        <div id="app-navbar-collapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">&nbsp;</ul>
          <ul class="nav navbar-nav navbar-right">
            <li style="margin-right: 10px"><a href="#">FAQ</a></li>
            <li class="action-btn"><a href="<? echo SITE_URL;?>/feedback">Your FeedBack</a></li>
            <? if (classes\Session::has('user')): ?>
              <li style="margin-right: 10px">
                <a href="#">Joram</a></li>
            <? endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation End -->

    <!-- Container -->
    <!-- <div class="container" style="min-height: 500px;"> -->
