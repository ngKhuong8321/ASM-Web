<?php include 'inc/header.php'; ?>
    <h2><?php echo $title;?></h2>
    <?php foreach($jobs as $job): ?>
    <div class="row marketing" style="padding: 10px; border-color: #338FD0; border-style: solid; border-width: thin; border-radius: 5px;">      
        <div class="col-md-10">
        <h3>Position: <?php echo $job->job_title; ?></h2>
        <p>Job Description: <?php echo $job->description; ?></p>
      </div>
      <div class="col-md-2">
          <a class="btn btn-success" href="job.php?id=<?php echo $job->id; ?>">View Job</a>
      </div>
    </div>
    <?php endforeach;?>

<?php include 'inc/footer.php'; ?>