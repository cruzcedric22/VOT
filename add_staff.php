<?php 
include('config.php');
$query = "SELECT * FROM vot_year WHERE status = 1";
$exe = $conn->query($query);
while($row = mysqli_fetch_array($exe)){
    $year_id = $row['id'];
    // echo $year_id;
}

if(isset($_POST)){
    $stffname = $_POST['addsff_name'];
    $stfmname = $_POST['addsff_mname'];
    $stflname = $_POST['addsff_lname'];
    $stffusername = $_POST['addsff_username'];
    $stffpass = $_POST['addsff_pass'];
    // $stffpasscon = $_POST['addsff_pass_con'];
    $encrypt_pass = sha1($stffpass);
    $stffcourse = $_POST['addsff_course'];
    $stffemail = $_POST['addsff_email'];
    $staff_id_count = "SELECT COUNT(student_no) AS count_staff FROM vot_user_profile";
    $exe1 = mysqli_query($conn,$staff_id_count);
    $countid = mysqli_fetch_array($exe1);
    $stffstdno = $countid['count_staff'];
   

    if(($stffname == "" || $stfmname == "") || ($stflname == "" || $stffusername == "") || ($stffemail == "" || $stffstdno == "") || $stffpass == ""){
        // echo "<script> alert('Please Enter Credentials'); </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'staff.php'
        // },1); </script>";
        $msg['title'] = "Warning";
		$msg['message'] =  "Please input credentials";
		$msg['icon'] =  "warning";
        $msg['exist'] = "Empty";
    }else{

        $select = "SELECT vot_users.username, vot_user_profile.fname, vot_user_profile.student_no FROM vot_users, vot_user_profile WHERE vot_users.username = '$stffusername' OR vot_user_profile.email ='$stffemail'";
    if($result = $conn ->query($select)){
        if($result -> num_rows > 0){
            // echo "<script> alert('user already exist'); </script>";
            // echo "<script> setTimeout(() => {
            //     window.location.href = 'staff.php'
            // },1); </script>"; 
        $msg['title'] = "Error";
		$msg['message'] =  "User Already Exist";
		$msg['icon'] =  "error";
        $msg['exist'] = "exist";
        }else{
            $insert = "INSERT INTO vot_users (category_id, username, password, student_no) VALUES ('2', '$stffusername', '$encrypt_pass', '$stffstdno')";
            $insert1 = "INSERT INTO vot_user_profile (fname,m_initial,lname,email,course_id, student_no, status, year_id) VALUES ('$stffname', '$stfmname', '$stflname', '$stffemail', '$stffcourse', '$stffstdno', '1', '$year_id')";
            if($conn -> query($insert) && $conn -> query($insert1)){
                // echo "<script> alert('Successful'); </script>";
                // echo "<script> setTimeout(() => {
                //     window.location.href = 'staff.php'
                // },1); </script>"; 
        $msg['title'] = "Successful";
        $msg['message'] =  "Successfully Registered";
        $msg['icon'] =  "success";
        $msg['exist'] = "success";
            }else{
                die ($conn -> error);
            }
        }
    }else{
        die ($conn -> error);
    }
     
           
        
        
            // // $curr_year =date('Y',time());
            //     $query1 = "SELECT * FROM vot_year WHERE status = 1'";
            //     $exe1 = $conn->query($query1);
            //     while($row1 = mysqli_fetch_array($exe1)){
            //         $year_id1 = $row1['id'];
            //         // echo $year_id;
            //     }
        }

    
   
        echo json_encode($msg);
    }

    







