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

    <style>
    .dropdown-menu{
      font-size: 12px;
    }
    .dropdown-menu > li > a {
      padding: 6px 20px;
    }
    .dropdown-menu .divider {
      margin: 3px 0;
    }
    .username{
      outline: dashed 1px;
      padding-top: 8px !important;
      padding-bottom: 8px !important;
    }
    .body-background{
      background: #f5f8fa !important;
    }
    </style>

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
            <? if (classes\Session::has('user')): ?>
              <li style="margin-right: 10px">
                <a class="dropdown-toggle username" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
                  <? echo explode(' ', classes\Session::get('user')->name)[0]; ?>
                  <span class="caret"></span></a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Your Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/logout" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             Logout</a>
                           </li>

                    <!-- Logout form -->
                    <form class="" id="logout-form" action="<? echo SITE_URL.'/logout'; ?>" method="post">
                      <input type="hidden" name="id" value="<? echo classes\Session::get('user')->id ?>" >
                    </form>
                  </ul>
              </li>
            <? else: ?>
              <li class="action-btn"><a href="#" data-toggle="modal" data-target="#loginModal" >Your FeedBack</a></li>
            <? endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation End -->

    <!-- Container -->
    <!-- <div class="container" style="min-height: 500px;"> -->
