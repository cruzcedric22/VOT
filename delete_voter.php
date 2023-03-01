<?php
include('config.php');
if(isset($_POST['idveri'])){

$deleteid = $_POST['idveri'];
$msg = array();


$delete1 = "UPDATE vot_user_profile SET status = 1 WHERE student_no ='$deleteid'";
if($conn -> query($delete1)){
    // echo "<script> alert('User Verified'); </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'list_voters.php'
    // },1); </script>";
         $msg['title'] = "Successful";
		$msg['message'] =  "Successfully Verified";
		$msg['icon'] =  "success";
}else{
    die ($conn -> error);
}
echo json_encode($msg);


}

if(isset($_POST['idinactive'])){

    $deleteid = $_POST['idinactive'];
    
    
    $delete1 = "UPDATE vot_user_profile SET status = 2 WHERE student_no ='$deleteid'";
    if($conn -> query($delete1)){
        // echo "<script> alert('User Inactive'); </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'list_voters.php'
        // },1); </script>";
        $msg['title'] = "Successful";
		$msg['message'] =  "Successfully set status to inactive";
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
            // echo "<script> alert('User Active'); </script>";
            // echo "<script> setTimeout(() => {
            //     window.location.href = 'list_voters.php'
            // },1); </script>";
            $msg['title'] = "Successful";
            $msg['message'] =  "Successfully set status to active";
            $msg['icon'] =  "success";
        }else{
            die ($conn -> error);
        }

        echo json_encode($msg);
        
        
        }

