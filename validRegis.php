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






?>