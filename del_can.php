<?php 
include('config.php');
session_start();
$log_id= $_SESSION['id'];
$user_log = $_SESSION['username'];
$log_can = $_POST['log_name'];

if(isset($_POST['del_submit'])){
    $del_id = $_POST['del_id'];
    $delete = "DELETE FROM vot_candidates WHERE id = '$del_id'";
    $executedel = $conn -> query($delete);
    $insertlog = "INSERT INTO vot_logs (user_id,action,added_by) VALUES ('$log_id', 'Candidate $log_can is deleted by', '$user_log')";
                mysqli_query($conn,$insertlog);

    echo " echo <script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1); </script>";
}