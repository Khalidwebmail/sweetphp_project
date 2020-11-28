<?php

  // Load Core file
  require_once "../config/app.php";
  require_once "../config/config.php";
  require_once "Classes/Str.php";
  require_once "Classes/Redirect.php";
  require_once "Classes/Session.php";
  require_once "Helper/function.php";
  /**
   * load class automatically respect of demand
   */
  spl_autoload_register(function ($class) {
    require_once 'Libraries/'. $class . '.php';
  });
