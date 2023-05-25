<?php 
include("config.php");


    if(isset($_POST['qrScanMob'])){
        $qrScanToVote = $_POST['qrScanMob'];
        $userid = $_POST['id'];
        $msg = array();

        $queryToVote = "SELECT * FROM vot_users WHERE password = '$qrScanToVote'";
        $result = $conn -> query($queryToVote);
        if(mysqli_num_rows($result) > 0){
            $msg['result'] = "DATA IS SEND";
        }
        echo json_encode($msg); 

    }

?>