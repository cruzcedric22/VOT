<?php 
include('config.php');
// session_start();
// $log_id= $_SESSION['id'];
// $user_log = $_SESSION['username'];


if(isset($_POST['del_id'])){
    $log_id= $_POST['log_id2'];
    $user_log = $_POST['log_user2'];
    $log_can = $_POST['log_name1'];
    $del_id = $_POST['del_id'];
    $delete = "UPDATE vot_candidates SET status = 0 WHERE id = '$del_id'";
    $executedel = $conn -> query($delete);
    $insertlog = "INSERT INTO vot_logs (user_id,action) VALUES ('$log_id', 'Candidate $log_can concedes')";
                mysqli_query($conn,$insertlog);
    // echo "<script> alert('Candidate Conceded'); </script>";
    // echo "echo <script> setTimeout(() => {
    //     window.location.href = 'candidates.php'
    // },1); </script>";
    $msg['title'] = "Success";
    $msg['message'] =  "Candidate Conceded";
    $msg['icon'] =  "success";
    echo json_encode($msg);
}

if(isset($_POST['del_active'])){
    $log_id= $_POST['log_id1'];
    $user_log = $_POST['log_user1'];
    $log_can = $_POST['log_name'];
    $del_id = $_POST['del_active'];
    $delete = "UPDATE vot_candidates SET status = 1 WHERE id = '$del_id'";
    $executedel = $conn -> query($delete);
    $insertlog = "INSERT INTO vot_logs (user_id,action) VALUES ('$log_id', 'Candidate $log_can joins the election')";
                mysqli_query($conn,$insertlog);
    // echo "<script> alert('Candidate Active'); </script>";
    // echo "echo <script> setTimeout(() => {
    //     window.location.href = 'candidates.php'
    // },1); </script>";
    $msg['title'] = "Success";
        $msg['message'] =  "Successfully Set Candidate to Active";
        $msg['icon'] =  "success";
        echo json_encode($msg);
}

if(isset($_POST['del_verify'])){
    $log_id= $_POST['log_id3'];
    $user_log = $_POST['log_user3'];
    $log_can = $_POST['log_name2'];
    $del_id = $_POST['del_verify'];
    $delete = "UPDATE vot_candidates SET status = 1 WHERE id = '$del_id'";
    $executedel = $conn -> query($delete);
    $insertlog = "INSERT INTO vot_logs (user_id,action) VALUES ('$log_id', 'Candidate $log_can gets verified')";
                mysqli_query($conn,$insertlog);
    // echo "<script> alert('Candidate Verified'); </script>";
    // echo "echo <script> setTimeout(() => {
    //     window.location.href = 'candidates.php'
    // },1); </script>";
    $msg['title'] = "Success";
    $msg['message'] =  "Candidate Verified";
    $msg['icon'] =  "success";
    echo json_encode($msg);
}