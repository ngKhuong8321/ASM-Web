<?php
session_start();

include(dirname(__FILE__)."/../config/config.php");
include(dirname(__FILE__)."/../auth/functions.php");

$cv_data = get_cv_data($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $skills = $_POST['skills'];
        $education = $_POST['education'];
        $experience = $_POST['experience'];
        $about = $_POST['about'];
        $contact_email = $_POST['contact_email'];
        if(!empty($fullname) && !empty($dob) && !empty($phone) && !empty($about) && !empty($education) && !empty($contact_email) && !empty($experience) && !empty($skills))
        {
            //save to database
            $id = $cv_data['candidate_id'];
            $query = "update cv 
                    set fullname = '$fullname',
                        dob = '$dob', 
                        about = '$about',
                        phone = '$phone',
                        contact_email = '$contact_email',
                        skills = '$skills',
                        education = '$education',
                        experience = '$experience'
                    where candidate_id = '$id'";

            mysqli_query($con, $query);

            header("Location: /joblister/candidate/cv.php");
            die;
        } else {
            echo "Information Not Valid Or Empty";
        }
    }

?>

<?php include(dirname(__DIR__)."/templates/inc/header.php"); ?>
    <h2 class="page-header"> Edit <?php echo $cv_data['fullname'];?> CV</h2>
    <form method="post">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="fullname" value="<?php echo $cv_data['fullname'];?>" >
        </div>
        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="date" class="form-control" name="dob" value="<?php echo $cv_data['dob']; ?>">
        </div>
        <div class="form-group">
            <label>About Me</label>
            <input type="text" class="form-control" name="about" value="<?php echo $cv_data['about']; ?>">
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <textarea type="text" class="form-control" name="phone"><?php echo $cv_data['phone']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $cv_data['contact_email']; ?>">
        </div>
        <div class="form-group">
            <label>Skills</label>
            <textarea name="skills"><?php echo $cv_data['skills']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Education</label>
            <textarea name="education"><?php echo $cv_data['education']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Experience</label>
            <textarea name="experience"><?php echo $cv_data['experience']; ?></textarea>
        </div>
        <input type="submit" class="btn btn-default" value="Submit" name="submit">
    </form>
    <script src="/joblister/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('skills');
        CKEDITOR.replace('education');
        CKEDITOR.replace('experience');
    </script>
    
<?php include dirname(__DIR__)."/templates/inc/footer.php"; ?>

