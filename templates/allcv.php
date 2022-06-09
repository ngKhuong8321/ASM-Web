<?php include 'inc/header.php'; ?>

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
          <a class="btn btn-success" href="">Send Offer</a>
      </div>
    </div>
    <?php endforeach;?>

<?php include 'inc/footer.php'; ?>

