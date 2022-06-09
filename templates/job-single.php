<?php include 'inc/header.php'; 
include(dirname(__FILE__)."/../config/config.php");
include(dirname(__FILE__)."/../auth/functions.php");
$user_data = get_user_data($con);
?>

<h2 class="page-header"><?php echo $job->job_title;?> (<?php echo $job->location;?>)</h2>
<small>Posted By <?php echo $job->contact_user;?> on <?php echo $job->post_date;?></small>

<hr>
<p class="lead"><?php echo $job->description; ?></p>
<ul class="list-group">
    <li class="list-group-item"><strong>Company:</strong><?php echo $job->company;?></li>
    <li class="list-group-item"><strong>Salary:</strong><?php echo $job->salary;?></li>
    <li class="list-group-item"><strong>Email:</strong><?php echo $job->contact_email;?></li>
</ul>

<br><br>
<div class="well">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($user_data['user_type'] === 'employer') :?>
        <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-default">Edit</a>
        <form style="display:inline;" method="post" action="job.php">
            <input type="hidden" name="del_id" value="<?php echo $job->id;?>">
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
        <?php elseif($user_data['user_type'] === 'candidate') :?>
        <form style="display:inline;" method="post" action="job.php">
            <input type="hidden" name="apply" value="<?php echo $job->id;?>">
            <input type="submit" class="btn btn-success" value="Apply">
        </form>
        <?php endif; ?>
    <?php endif; ?>
</div>
<br><br>
<a href="index.php">Back to All Listings</a>

<?php include 'inc/footer.php'; ?>