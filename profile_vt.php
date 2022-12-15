<?php 
session_start();
include('config.php');
include('voters.php');

$fname = $_SESSION['fname'];
$mname = $_SESSION['m_initial'];
$lname = $_SESSION['lname'];
$course = $_SESSION['course_name'];
$voted = $_SESSION['isvoted'];
$stdno = $_SESSION['student_no'];
$user_type = $_SESSION['cat_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<div class="container-fluid px-4">
                
                <div class="p-3 bg-white shadow-sm text-center  rounded">
                    <div>
                        <h3 class="fs-2">Name:</h3>
                        <p class="fs-5"><?php echo $fname. ' ' . $mname . ' ' . $lname ?></p>
                        <h3 class="fs-2">Course</h3>
                        <p class="fs-5"><?php echo $course ?></p>
                        <h3 class="fs-2">Student Number</h3>
                        <p class="fs-5"><?php echo $stdno ?></p>
                        <!-- <h3 class="fs-2"><?php //echo 'Election '. $user_type ?></h3> -->
                        <?php if($voted == 1){ ?>
                        <h3 class="fs-2">Status</h3>
                        <p class="fs-5">Voted</p>
                        <?php }else{ ?>
                            <h3 class="fs-2">Status</h3>
                            <p class="fs-5"> Not Voted</p>
                            <?php } ?>
                    </div>
                    
                </div>
        
    </div>
    
</body>
</html>