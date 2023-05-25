<?php 
include("config.php");


if(isset($_POST['userid'])){
    $useridQr = $_POST['userid'];
    $msg1 = array();

    $checkIfQrIsScanned = "SELECT * FROM vot_users WHERE id = '$useridQr'";
     $b =  $conn -> query($checkIfQrIsScanned);
        while($row = mysqli_fetch_assoc($b)){
            $userIsScanned = $row['is_qr'];
            if($userIsScanned == 1){
                $msg1['status'] = "valid";
            }else{
                $msg1['status'] = "invalid";
            }
        }
       
       

    echo json_encode($msg1); 
}


?>