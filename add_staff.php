<?php 
include('config.php');

if(isset($_POST['btn_addsff'])){
    $stffname = $_POST['addsff_name'];
    $stfmname = $_POST['addsff_mname'];
    $stflname = $_POST['addsff_lname'];
    $stffusername = $_POST['addsff_username'];
    $stffpass = $_POST['addsff_pass'];
    $stffpasscon = $_POST['addsff_pass_con'];
    $encrypt_pass = sha1($stffpass);
    $stffcourse = $_POST['addsff_course'];
    $stffemail = $_POST['addsff_email'];
    $stffstdno = $_POST['addsff_stdno'];

    if(($stffname == "" || $stfmname == "") || ($stflname == "" || $stffusername == "") || ($stffpass == "" || $stffcourse == "") || ($stffemail == "" || $stffstdno == "")){
        echo "<script> alert('Please Enter Credentials'); </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'staff.php'
        },1); </script>";
    }

    $select = "SELECT vot_users.username, vot_user_profile.fname, vot_user_profile.student_no FROM vot_users, vot_user_profile WHERE vot_users.username = '$stffusername' AND (vot_users.student_no = '$stffstdno' AND vot_user_profile.student_no = '$stffstdno')";
    if($result = $conn ->query($select)){
        if($result -> num_rows > 0){
            echo "<script> alert('user already exist'); </script>";
            echo "<script> setTimeout(() => {
                window.location.href = 'staff.php'
            },1); </script>";
        }
        elseif ($stffpass == $stffpasscon){
            $curr_year =date('Y',time());
                $query = "SELECT * FROM vot_year WHERE year = '$curr_year'";
                $exe = $conn->query($query);
                while($row = mysqli_fetch_array($exe)){
                    $year_id = $row['id'];
                }
            $insert = "INSERT INTO vot_users (category_id, username, password, student_no) VALUES ('2', '$stffusername', '$encrypt_pass', '$stffstdno')";
            $insert1 = "INSERT INTO vot_user_profile (fname,m_initial,lname,email,course_id, student_no, year_id) VALUES ('$stffname', '$stfmname', '$stflname', '$stffemail', '$stffcourse', '$stffstdno', '$year_id')";
            if($conn -> query($insert) && $conn -> query($insert1)){
                echo "<script> alert('Successful'); </script>";
                echo "<script> setTimeout(() => {
                    window.location.href = 'staff.php'
                },1); </script>";
            }else{
                die ($conn -> error);
            }
        }else{
            echo "<script> alert('Password Not Match'); </script>";
            echo "<script> setTimeout(() => {
                window.location.href = 'staff.php'
            },1); </script>";
        }
    }else{
        die ($conn -> error);
    }

    







}