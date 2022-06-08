<?php
    //Start session
    session_start();
    //Config file
    require_once 'config.php';
    //Include helpers
    require_once 'helpers/system_helper.php';
    //Auto loader
    spl_autoload_register(function ($class_name) {
        require_once 'lib/'. $class_name . '.php';
    });
?>

