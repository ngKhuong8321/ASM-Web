<?php
    include_once 'config/init.php';
    $job = new Job;
    $template = new Template('templates/mylisting.php');
    
    $template->jobs = $job->myList($_SESSION['user_id']);
    $template->title = 'My List';
    echo $template;

?>