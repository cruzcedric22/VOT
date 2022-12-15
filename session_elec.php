<?php 
session_start();
include('config.php');
if(isset($_POST['btn_start'])){

    $update_start = "UPDATE vot_session SET is_election = 1";
    if($exe = $conn -> query($update_start)){
        $session_elect = "SELECT * FROM vot_session";
        if($exe2 = $conn ->query($session_elect)){
            echo "<script> alert('Election has started') </script>";
            echo "<script> setTimeout(() => {
                window.location.href = 'admin_setting.php'
            },1); </script>";
            while($row = mysqli_fetch_assoc($exe2)){
                $_SESSION['is_election'] = $row['is_election'];
            }
           
    
        }else{
            die($conn -> error);
        }
       
    }else{
        die($conn -> error);
    }

}

if(isset($_POST['btn_end'])){
    $update_end = "UPDATE vot_session SET is_election = 0";
    if($exe = $conn -> query($update_end)){
        $session_elect = "SELECT * FROM vot_session";
        if($exe2 = $conn ->query($session_elect)){
            echo "<script> alert('Election has ended') </script>";
            echo "<script> setTimeout(() => {
                window.location.href = 'admin_setting.php'
            },1); </script>";
            while($row = mysqli_fetch_assoc($exe2)){
                $_SESSION['is_election'] = $row['is_election'];
            }
           
    
        }else{
            die($conn -> error);
        }
       
    }else{
        die($conn -> error);
    }
}