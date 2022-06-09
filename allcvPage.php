<?php include_once 'config/init.php'; 
include("config/config.php");
include("auth/functions.php");
$user_data = get_user_data($con);
?>
<?php
$cv = new CV;
$template = new Template('templates/allcv.php');
if (isset($_SESSION['user_id']))
{
    if ($user_data['user_type'] === 'employer') {
        $template->cvs = $cv->getCV($user_data['user_id']);
    } else {
        $template->cvs = $cv->getAll();
    }
}

if(isset($_POST['accept_cv'])){
    $cv_id = $_POST['accept_cv'];
    $job_id = $_POST['accept_job'];
    if ($cv->decide(1, $cv_id, $job_id)){
        redirect('index.php', 'Sucessfully', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');
    }
}
if(isset($_POST['decline_cv'])){
    $cv_id = $_POST['decline_cv'];
    $job_id = $_POST['decline_job'];
    if ($cv->decide(0, $cv_id, $job_id)){
        redirect('index.php', 'Sucessfully', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');
    }
}


$template->title = "All CV";

echo $template;

?>