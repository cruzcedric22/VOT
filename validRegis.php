<?php 
include('config.php');

if(isset($_POST['stdnoData'])){
    $stdnoData = $_POST['stdnoData'];
    $checkDb = "SELECT * from vot_users WHERE student_no = '$stdnoData'";
    $result = $conn -> query($checkDb);
    // $result -> num_rows > 0;

    if($result -> num_rows == 0){
        $data = "valid";

    }else{
        $data = "invalid";
    }

    echo json_encode($data);
}

if(isset($_POST['emailData'])){
    $emailData = $_POST['emailData'];
    $checkDb = "SELECT * FROM vot_user_profile WHERE email= '$emailData'";
    $result = $conn -> query($checkDb);

    if($result -> num_rows == 0){
        $data = "valid";
    }else{
        $data = "invalid";
    }
    
    echo json_encode($data);


}

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $checkDb = "SELECT * FROM vot_users WHERE username = '$username'";
    $result = $conn -> query($checkDb);

    if($result -> num_rows == 0){
        $data = "valid";
    }else{
        $data = "invalid";
    }

    echo json_encode($data);
}







?>