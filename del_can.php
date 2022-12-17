<?php 
include('config.php');
session_start();
$log_id= $_SESSION['id'];
$user_log = $_SESSION['username'];
$log_can = $_POST['log_name'];

if(isset($_POST['del_submit'])){
    $del_id = $_POST['del_id'];
    $delete = "UPDATE vot_candidates SET status = 0 WHERE id = '$del_id'";
    $executedel = $conn -> query($delete);
    $insertlog = "INSERT INTO vot_logs (user_id,action) VALUES ('$log_id', 'Candidate $log_can concedes')";
                mysqli_query($conn,$insertlog);
    echo "<script> alert('Candidate Conceded'); </script>";
    echo "echo <script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1); </script>";
}

if(isset($_POST['del_active'])){
    $del_id = $_POST['del_id'];
    $delete = "UPDATE vot_candidates SET status = 1 WHERE id = '$del_id'";
    $executedel = $conn -> query($delete);
    $insertlog = "INSERT INTO vot_logs (user_id,action) VALUES ('$log_id', 'Candidate $log_can joins the election')";
                mysqli_query($conn,$insertlog);
    echo "<script> alert('Candidate Active'); </script>";
    echo "echo <script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1); </script>";
}