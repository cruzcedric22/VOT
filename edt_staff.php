<?php 
include('config.php');
if(isset($_POST['edtstff_submit'])){
    $stffid = $_POST['edt_id'];
    $edtstff_name = $_POST['edt_name'];
    $edtstff_username = $_POST['edt_username'];
    $edtstff_pass = $_POST['edt_pass'];
    $encrypt_pass = sha1($edtstff_pass);
    $edtstff_course = $_POST['edt_course'];
    $edtstff_email = $_POST['edt_email'];

    $edtstff = "UPDATE vot_users SET username = '$edtstff_username', password = '$encrypt_pass' WHERE student_no = '$stffid'";
    $edtstff1 = "UPDATE vot_user_profile SET fname ='$edtstff_name', email = '$edtstff_email', course_id = '$edtstff_course' WHERE student_no ='$stffid'";

    if($edtstff_pass == ""){
        $edtwpass = "UPDATE vot_users SET username = '$edtstff_username' WHERE student_no = '$stffid'";
        $edtstff1 = "UPDATE vot_user_profile SET fname ='$edtstff_name', email = '$edtstff_email', course_id = '$edtstff_course' WHERE student_no ='$stffid'";
        $conn->query($edtwpass);
        if($conn->query($edtstff1) == TRUE){
              echo "<script> alert('successfully edited') </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'staff.php'
        },1); </script>";
        }else{
            die($conn -> error);
        }
      

    }else{
        if($conn -> query($edtstff) == TRUE && $conn -> query($edtstff1) == TRUE){
            echo "<script> alert('successfully edited') </script>";
            echo "<script> setTimeout(() => {
                window.location.href = 'staff.php'
            },1); </script>";
        }else{
            die ($conn -> error);
        }
    }
}
