<?php
include('config.php');
if(isset($_POST['delvoter_submit'])){

$deleteid = $_POST['delstff_id'];

$delete = "DELETE FROM vot_users WHERE student_no = '$deleteid'";
$delete1 = "DELETE FROM vot_user_profile WHERE student_no ='$deleteid'";
if($conn->query($delete) && $conn -> query($delete1)){
    echo "<script> alert('successfully deleted') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'list_voters.php'
    },1); </script>";
}else{
    die ($conn -> error);
}


}