<?php

    include(dirname(dirname(__FILE__))."/../config/config.php");
    include(dirname(dirname(__FILE__))."/../auth/functions.php");

    $user_data = get_user_data($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>JobLister</title>
        
        <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        
    <div class="container">

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right"> 
            <li role="presentation"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="create.php">Create Listing</a></li>
            <?php if(!$user_data) : ?>
            <li role="presentation"><a href="auth/login.php">Login</a></li>
            <li role="presentation"><a href="auth/signup.php">Sign up</a></li>
            <?php else : ?>
            <li role="presentation"><a href="index.php">Welcome, <?php echo $user_data['user_name']; ?></a></li>
            <li role="presentation"><a href="auth/logout.php">Log Out</a></li>
            <?php endif; ?>
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo SITE_TITLE; ?></h3>
      </div>
      <?php displayMessage(); ?>