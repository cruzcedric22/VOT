<?php 
session_start();
include('config.php');
$user_id = $_SESSION['id'];
if(isset($_POST['change_pass']) && $_POST['change_pass_confirm']){
    $newpass = $_POST['change_pass'];
    $confirm_new_pass = $_POST['change_pass_confirm'];
    $encrypt_pass = sha1($newpass);

    $msg = array();

    if($newpass == $confirm_new_pass){
        $updatequery = "UPDATE vot_users SET password = '$encrypt_pass' WHERE id = '$user_id'";
        if($conn -> query($updatequery)){
            // echo "<script> alert('Success'); </script>";
            // echo "<script> setTimeout(() => {
            //     window.location.href = 'admin_setting.php'
            // },1); </script>";
            $msg['title'] = "Successful";
            $msg['message'] =  "Successfully Saved";
            $msg['icon'] =  "success";
        }else{
            die($conn -> error);
        }
    }else{
        // echo "<script> alert('Password Didn't Match'); </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'admin_setting.php'
        // },1); </script>";
        $msg['title'] = "Warning";
        $msg['message'] =  "Password Didn't Match";
        $msg['icon'] =  "warning";
    }

    echo json_encode($msg);




}