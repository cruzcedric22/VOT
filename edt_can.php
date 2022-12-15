<?php 
include('config.php');
session_start();
if(isset($_POST['submit'])){
    $id = $_POST['edt_id'];
    $name = $_POST['edt_name'];
    $mname = $_POST['edt_mname'];
    $lname = $_POST['edt_lname'];
    $course = $_POST['edt_course'];
    $pos = $_POST['edit_pos'];
    $party = $_POST['edit_party'];
    $edt_photo = $_FILES['edt_photo'];
    $log_id= $_SESSION['id'];
    $user_log = $_SESSION['username'];
    $log_can = $_POST['log_name'];

    

   

    if($_FILES['edt_photo']['error'] === 4){
        $query = "UPDATE vot_candidates SET partylist_id = '$party', position_id = '$pos', name ='$name', m_initial ='$mname', lname ='$lname', course_id = '$course' WHERE id = '$id' ";
        mysqli_query($conn,$query);
        $insertlog = "INSERT INTO vot_logs (user_id,action,added_by) VALUES ('$log_id', 'Candidate $log_can is edited by', '$user_log')";
        mysqli_query($conn,$insertlog);
         echo "<script> alert('Success'); </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'candidates.php'
        }); </script>";
    }else{
        $filename = $_FILES['edt_photo']['name'];
        $size = $_FILES['edt_photo']['size'];
        $tmp_name = $_FILES['edt_photo']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension,$validImageExtension)){
                echo "<script> alert('Invalid Image Extension'); </script>";
            }
            else if($size > 512000){
                echo "<script> alert('Size too large'); </script>";
            }else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmp_name, 'webimg/' . $newImageName );
                // $targer_dir="webimg/";
                // $targer_file=$targer_dir.$filename;
                // $filetype=strtolower(strtolower(pathinfo($targer_file,PATHINFO_EXTENSION)));
                echo '<script> alert("Successful");</script>';
                $query = "UPDATE vot_candidates SET partylist_id = '$party', position_id = '$pos', name ='$name', m_initial ='$mname', lname ='$lname', course_id = '$course', photo= '$newImageName' WHERE id = '$id' ";
                mysqli_query($conn,$query);

                $insertlog = "INSERT INTO vot_logs (user_id,action,added_by) VALUES ('$log_id', 'Candidate $log_can is edited by', '$user_log')";
                mysqli_query($conn,$insertlog);
                
                echo "<script> setTimeout(() => {
                    window.location.href = 'candidates.php'
                }); </script>";
                
            }
    }




}
