<?php
include('config.php');

if(isset($_POST['delstff_submit'])){

    $deleteid = $_POST['delstff_id'];

    
    $delete1 = "UPDATE vot_user_profile SET status = 2 WHERE student_no ='$deleteid'";
    if($conn -> query($delete1)){
        echo "<script> alert('User Inactive') </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'staff.php'
        },1); </script>";
    }else{
        die ($conn -> error);
    }


}

if(isset($_POST['delstff_active'])){

    $deleteid = $_POST['delstff_id'];

    
    $delete1 = "UPDATE vot_user_profile SET status = 1 WHERE student_no ='$deleteid'";
    if($conn -> query($delete1)){
        echo "<script> alert('User Active') </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'staff.php'
        },1); </script>";
    }else{
        die ($conn -> error);
    }


}

