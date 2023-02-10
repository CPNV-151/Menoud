<?php

session_start();
require "controller/navigation.php";
require "controller/snownavigation.php";

if (isset($_GET['action'])) {
  $action = $_GET['action'];
  switch ($action) {
      case 'home' :
          home();
          break;
      case 'snow' :
          snow();
          break;
      default :
          lost();
      }
    }
else {
    home();
}