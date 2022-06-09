<?php
session_start();

include(dirname(__FILE__)."/../config/config.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //read from database
        $user_id = random_num(20);
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['user_id'];
                    if($user_data['user_type'] === 'candidate' || $user_data['user_type'] === 'admin'){
                        header("Location: ../index.php");
                    } else {
                        header("Location: ../allcvPage.php");
                    }
                    die;
                }
            }
        }

        echo "Wrong username or password";
        die;
    } else {
        echo "Information Not Valid Or Empty";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>

        <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
        <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Log In</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="user_name" id="user_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Log In">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="signup.php" class="text-info">Sign Up Here</a>
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