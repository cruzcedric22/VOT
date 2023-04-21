<?php
session_start();
include('config.php');

$msg = array();






if((isset($_POST['start_filing']) && isset($_POST['end_filing'])) && isset($_POST['end_elec'])){
        $date_time_start_filing = $_POST['start_filing'];
        $date_time_end_filing = $_POST['end_filing'];
        $date_time_end_elec = $_POST['end_elec'];
        if(($date_time_start_filing != "" && $date_time_end_filing != "") && $date_time_end_elec != ""){
        $update_start = "UPDATE vot_session SET start_time_filing = '$date_time_start_filing', end_time_filing = '$date_time_end_filing', end_time_elec = '$date_time_end_elec'";
    
        if($exe = $conn -> query($update_start)){
            // echo "<script> alert('Date has been set'); </script>";
            // echo "<script> setTimeout(() => {
            //       window.location.href = 'admin_setting.php'
            //        },1); </script>";
            $msg['title'] = "Successful";
            $msg['message'] =  "Date has been set";
            $msg['icon'] =  "success";
            $msg['status'] = "success";
        
        }else{
            die($conn -> error);
        }
        }
        else{
            $msg['title'] = "Warning";
            $msg['message'] =  "Input dates";
            $msg['icon'] =  "warning";
            $msg['status'] = "error";

        }

        echo json_encode($msg);

    }
            
           
    

// if(isset($_POST['btn_end_filing'])){
//     $update_end = "UPDATE vot_session SET is_filing = 0";
//     if($exe = $conn -> query($update_end)){
//         $session_elect = "SELECT * FROM vot_session";
//         if($exe2 = $conn ->query($session_elect)){
//             echo "<script> alert('Filing has ended') </script>";
//             echo "<script> setTimeout(() => {
//                 window.location.href = 'admin_setting.php'
//             },1); </script>";
//             while($row = mysqli_fetch_assoc($exe2)){
//                 $_SESSION['is_filing'] = $row['is_filing'];
//             }
           
    
//         }else{
//             die($conn -> error);
//         }
       
//     }else{
//         die($conn -> error);
//     }
// }