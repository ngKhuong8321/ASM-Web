<?php
// DB Params
if(!defined('DB_HOST')){
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "joblister");

    define("SITE_TITLE", "JobLister");
}
$DB_HOST = DB_HOST;
$DB_USER = DB_USER;
$DB_PASS = DB_PASS;
$DB_NAME = DB_NAME;


if(!$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME))
{
    die("Failed to Connect");
}
