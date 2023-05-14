<?php
include('config.php'); 

if(isset($_POST['stdno'])){
    $stdno = $_POST['stdno'];

    $delete1 = "UPDATE vot_user_profile SET status = 1 WHERE student_no ='$stdno'";
        if($conn -> query($delete1)){
           echo "<script> setTimeout(() => {
                 window.location.href = 'view_verify.php'
                  },1); </script>";
        }else{
            die ($conn -> error);
            echo "<script> setTimeout(() => {
                window.location.href = 'index.php'
                 },1); </script>";
        }
}

?>