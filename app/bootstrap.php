<?php

  // Load Core file
  require_once "../config/app.php";
  require_once "../config/config.php";

  /**
   * load class automatically respect of demand
   */
  spl_autoload_register(function ($class) {
    require_once 'Libraries/'. $class . '.php';
  });

  /**
   * load class automatically respect of demand
   */
  spl_autoload_register(function ($class) {
    require_once 'Classes/'. $class . '.php';
  });