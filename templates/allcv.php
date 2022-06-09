<?php include 'inc/header.php';
include("../config/config.php");
include("../auth/functions.php");
$user_data = get_user_data($con);
?>

    <h2><?php echo $title;?></h2>
    <?php foreach($cvs as $cv): ?>
    <div class="row marketing" style="padding: 15px; border-color: #338FD0; border-style: solid; border-width: thin; border-radius: 5px;">      
        <div class="col-md-10">
        <h3><?php echo $cv->fullname; ?></h3>
        <p>Date Of Birth: <?php echo $cv->dob; ?></p>
        <p>About Me: <?php echo $cv->about; ?></p>
        <p>Skills: <?php echo $cv->skills; ?></p>
        <p>Educations: <?php echo $cv->education; ?></p>
        <p>Experiences: <?php echo $cv->experience; ?></p>
        <p>Phone: <?php echo $cv->phone; ?></p>
        <p>Email: <?php echo $cv->contact_email; ?></p>
      </div>
      <div class="col-md-2">
        <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($user_data['user_type'] === 'employer') :?>
        <form style="display:inline;" method="post" action="allcvPage.php">
            <input type="hidden" name="accept_cv" value="<?php echo $cv->candidate_id;?>">
            <input type="hidden" name="accept_job" value="<?php echo $cv->job_id;?>">
            <input type="submit" class="btn btn-success" value="Accept">
        </form>
        <form style="display:inline;" method="post" action="allcvPage.php">
            <input type="hidden" name="decline_cv" value="<?php echo $cv->candidate_id;?>">
            <input type="hidden" name="decline_job" value="<?php echo $cv->job_id;?>">
            <input type="submit" class="btn btn-danger" value="Decline">
        </form>
        <?php endif; ?>

    <?php endif; ?>
      </div>
    </div>
    <?php endforeach;?>

<?php include 'inc/footer.php'; ?>

