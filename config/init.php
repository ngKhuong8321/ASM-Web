<?php
//Start Session
session_start();

//Config file
require_once 'config.php';

//Include Helpers
require_once 'helpers/system_helper.php';

//Autoloader
spl_autoload_register(function($class_name){
    include 'lib/'.$class_name. '.php';
});
