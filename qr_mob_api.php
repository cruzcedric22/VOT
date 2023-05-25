<?php 
include("config.php");
    if(isset($_POST['qrScanMob'])){
        $qrScanToVote = $_POST['qrScanMob'];
        $userid = $_POST['id'];
        $msg = array();

        $queryToVote = "SELECT * FROM vot_users WHERE student_no = '$qrScanToVote'";
        $result = $conn -> query($queryToVote);
        if(mysqli_num_rows($result) > 0){
            $toVerifyQr = "UPDATE vot_users SET is_qr = 1 WHERE student_no = '$qrScanToVote'";
            if($conn -> query($toVerifyQr)){
                $msg['result'] = "Successfully Scanned";
            }else{
                $msg['result'] = "Error";
            }

        }
        echo json_encode($msg); 

    }

?>