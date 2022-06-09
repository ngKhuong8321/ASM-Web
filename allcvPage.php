<?php include_once 'config/init.php'; ?>
<?php
$cv = new CV;

$template = new Template('templates/allcv.php');

$template->title = "All CV";
$template->cvs = $cv->getAll();
echo $template;

?>