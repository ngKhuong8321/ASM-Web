<?php include_once 'config/init.php'; ?>
<?php
$job = new Job;

if(isset($_POST['submit'])){
        $data = array();
        $data['job_title'] = $_POST['job_title'];
        $data['company'] = $_POST['company'];
        $data['description'] = $_POST['description'];
        $data['location'] = $_POST['location'];
        $data['salary'] = $_POST['salary'];
        $data['skills'] = $_POST['skills'];
        $data['position'] = $_POST['position'];  
        $data['contact_email'] = $_POST['contact_email'];
        $data['contact_user'] = $_POST['contact_user'];
        if($job->createJob($data)){
            redirect('index.php', 'Your job has been listed','success');
        } else {
            redirect('index.php', 'Something went wrong','error');
        }
}

$template = new Template('templates/job-create.php');
//$template->positions = $job
// $template->categories = $job->getCategories();
echo $template;

?>