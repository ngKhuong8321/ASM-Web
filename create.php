
<?php include_once 'config/init.php'; ?>
<?php
include("config/config.php");
include("auth/functions.php");
$user_data = get_user_data($con);
?>
<?php
$job = new Job;

if(isset($_POST['submit'])){
        $data = array();
        $data['job_title'] = $_POST['job_title'];
        $data['company'] = $_POST['company'];
        $data['category_id'] = $_POST['category'];
        $data['description'] = $_POST['description'];
        $data['location'] = $_POST['location'];
        $data['salary'] = $_POST['salary'];
        $data['contact_user'] = $_POST['contact_user'];
        $data['contact_email'] = $_POST['contact_email'];
        $data['employer_id'] = $user_data['user_id'];
        if($job->create($data)){
            redirect('index.php', 'Your job has been listed','success');
        } else {
            redirect('index.php', 'Something went wrong','error');
        }
}

$template = new Template('templates/job-create.php');

$template->categories = $job->getCategories();

echo $template;

?>