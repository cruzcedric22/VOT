<?php 
session_start();
include('config.php');
$user_id = $_SESSION['id'];
if(isset($_POST['btn_change_pass'])){
    $newpass = $_POST['change_pass'];
    $confirm_new_pass = $_POST['change_pass_confirm'];
    $encrypt_pass = sha1($newpass);

    if($newpass == $confirm_new_pass){
        $updatequery = "UPDATE vot_users SET password = '$encrypt_pass' WHERE id = '$user_id'";
        if($conn -> query($updatequery)){
            echo "<script> alert('Success'); </script>";
            echo "<script> setTimeout(() => {
                window.location.href = 'admin_setting.php'
            },1); </script>";
        }else{
            die($conn -> error);
        }
    }else{
        echo "<script> alert('Password Didn't Match'); </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'admin_setting.php'
        },1); </script>";
    }


}