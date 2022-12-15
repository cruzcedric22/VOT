<?php 
session_start();
include('config.php');
$del_user_id = $_SESSION['id'];
$del_user_stdno = $_SESSION['student_no'];
if(isset($_POST['btn_del_acc'])){
    $deletein_users = "DELETE FROM vot_users WHERE id = '$del_user_id'";
    if($conn -> query($deletein_users) === true){
        $deletein_user_profile = "DELETE FROM vot_user_profile WHERE student_no = '$del_user_stdno'";
        if($conn -> query($deletein_user_profile) === true){
            echo "<script> alert('Account Deleted'); </script>";
            session_start();
            session_destroy();
            echo "<script> setTimeout(() => {
                window.location.href = 'index.php'
            },1); </script>";

        }else{
            die($conn -> error);
        }

    }else{
        die($conn -> error);
    }

}