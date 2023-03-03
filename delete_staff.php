<?php
include('config.php');

if(isset($_POST['idinactive'])){

    $deleteid = $_POST['idinactive'];
    $msg = array();

    
    $delete1 = "UPDATE vot_user_profile SET status = 2 WHERE student_no ='$deleteid'";
    if($conn -> query($delete1)){
        // echo "<script> alert('User Inactive') </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'staff.php'
        // },1); </script>";  
        $msg['title'] = "Successful";
		$msg['message'] =  "Successfully Set User Inactive";
		$msg['icon'] =  "success";
    }else{
        die ($conn -> error);
    }
    echo json_encode($msg);

}

if(isset($_POST['idactive'])){

    $deleteid = $_POST['idactive'];

    
    $delete1 = "UPDATE vot_user_profile SET status = 1 WHERE student_no ='$deleteid'";
    if($conn -> query($delete1)){
        // echo "<script> alert('User Active') </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'staff.php'
        // },1); </script>";
        $msg['title'] = "Successful";
		$msg['message'] =  "Successfully Set User Active";
		$msg['icon'] =  "success";
    }else{
        die ($conn -> error);
    }

    echo json_encode($msg);
}

