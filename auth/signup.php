<?php
session_start();

    include(dirname(__FILE__)."/../config/config.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        if(!empty($user_name) && !empty($user_type) && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,user_type,password) values ('$user_id','$user_name','$user_type','$password')";
            $query2 = "insert into cv (fullname,dob,about,phone,contact_email,skills,education,experience,candidate_id) values ('$user_name','2022-01-01','Lorem ipsum','+84123456789','contact@email.com','lorem ipsum','lorem ipsum','lorem ipsum','$user_id')";

            mysqli_query($con, $query);
            mysqli_query($con, $query2);

            header("Location: login.php");
            die;
        } else {
            echo "Information Not Valid Or Empty";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>

        <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
        <div id="login">
        <h3 class="text-center text-white pt-5">Signup form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">Sign Up</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="user_name" id="user_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="user_type" class="text-info">I'm looking for:</label>
                            <select id="user_type" style="width: 100%" class="text-info" name="user_type">
                                <option value="candidate">A Job</option>
                                <option value="employer">An Employee</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign Up">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="login.php" class="text-info">Log In Here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </body>
</html>