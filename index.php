<?php
    include_once 'config/init.php';
    $job = new Job;
    $template = new Template('templates/frontpage.php');
    
    $skill = isset($_GET['skill']) ? $_GET['skill'] : null;
    if ($skill) {
        $template->title = $skill;
        $template->jobs = $job->getbySkill($skill);
    } else {
        $template->title = 'Latest Jobs'; 
        $template->jobs = $job->getAll();
    }
    $template->skills = $job->getSkills();
    echo $template;

?>