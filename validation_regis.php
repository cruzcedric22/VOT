<?php 
include('config.php');

if((isset($_POST['stdnoData1']) && isset($_POST['emailData1'])) && isset($_POST['username'])){
    $stdnoData = $_POST['stdnoData1'];
    $checkDb = "SELECT * from vot_users WHERE student_no = '$stdnoData'";
    $result = $conn -> query($checkDb);

    $emailData = $_POST['emailData1'];
    $checkDb1 = "SELECT * FROM vot_user_profile WHERE email= '$emailData'";
    $result1 = $conn -> query($checkDb1);

    $username = $_POST['username'];
    $checkDb2 = "SELECT * FROM vot_users WHERE username = '$username'";
    $result2 = $conn -> query($checkDb2);

    if(($result -> num_rows == 0 && $result1 -> num_rows == 0) && $result2 -> num_rows == 0){
       $data = "valid";
    }else{
        $data = "invalid";
    }
    echo json_encode($data);
}

?>