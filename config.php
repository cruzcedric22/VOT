<?php

$severname = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'voting';

$conn = new mysqli($severname,$db_user,$db_pass,$db_name);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($conn -> connect_error){
    die("Connection failed: ". $conn->connect_error);
}


// $user_cat = $_SESSION['cat_name'];

$query = "SELECT * FROM vot_session";
$result = $conn ->query($query);
while($row5 = mysqli_fetch_assoc($result)){
    $date1=$row5['start_time_filing'];
    $date2=$row5['end_time_filing'];
    $date3=$row5['end_time_elec'];
}
date_default_timezone_set('Asia/Manila');
$date = new DateTime();
$today = $date->format('Y-m-d H:i:s');
// echo $today;
if($today >= $date1 && $today <= $date2){
    //compare if filing start
   $update_start1 = "UPDATE vot_session SET is_filing = 1, is_election = 0";
   if($conn -> query($update_start1) == TRUE){
   $session_elect = "SELECT * FROM vot_session";
   if($exe2 = $conn ->query($session_elect)){   
    // if($user_cat == 'Admin'){
    
    // }
       while($row = mysqli_fetch_assoc($exe2)){
            $_SESSION['is_filing'] = $row['is_filing'];
            $_SESSION['oldValue'] = array($row['is_filing'], $row['is_election']);
             
       }
   }else{
       die($conn -> error);
   }
   }else{
    die($conn -> error);
   }
   //compare if filing ends
}elseif($today >= $date2 && $today <= $date3){
    $update_start1 = "UPDATE vot_session SET is_filing = 0, is_election = 1";
    if($conn -> query($update_start1) == TRUE){
    $session_elect = "SELECT * FROM vot_session";
    if($exe2 = $conn ->query($session_elect)){   
    //  if($user_cat == 'Admin'){
    
    //  }
        while($row = mysqli_fetch_assoc($exe2)){
             $_SESSION['is_filing'] = $row['is_filing'];
             $_SESSION['oldValue'] = array($row['is_filing'], $row['is_election']);
              
        }
    }else{
        die($conn -> error);
    }
    }else{
     die($conn -> error);
    }

}elseif($today > $date3){
    $update_start1 = "UPDATE vot_session SET is_election = 0, is_filing = 0";
    if($conn -> query($update_start1) == TRUE){
    $session_elect = "SELECT * FROM vot_session";
    if($exe2 = $conn ->query($session_elect)){   
    //  if($user_cat == 'Admin'){
     
    //  }
        while($row = mysqli_fetch_assoc($exe2)){
             $_SESSION['is_filing'] = $row['is_filing'];
             $_SESSION['oldValue'] = array($row['is_filing'], $row['is_election']);
              
        }
    }else{
        die($conn -> error);
    }
    }else{
     die($conn -> error);
    }

}




$curr_year =date('Y',time());
$query = "SELECT * FROM vot_year WHERE year = '$curr_year'";
$exe = $conn->query($query);
while($row = mysqli_fetch_array($exe)){
     $year_id = $row['id'];
}


$adminpass = sha1("admin");
$selectquery = "SELECT * FROM vot_users WHERE username = 'admin'";
if($result = $conn->query($selectquery)){
    if($result -> num_rows > 0)
        return;
    else{
        $insertAdmin = "INSERT INTO vot_users(category_id,username,password,student_no) VALUES ('3','admin','$adminpass','1')";
        $insertAdmin1 = "INSERT INTO vot_user_profile(fname,m_initial,lname,email,course_id,student_no,status,year_id) VALUES ('admin','admin','admin','admin','1','1','1','$year_id')";
        
        if($conn -> query($insertAdmin) === true && $conn -> query($insertAdmin1)){
            return;
        }else{
        die ($conn -> error);
        }
    }
}
else{
    die($conn -> error);
}







// $db_user = "root";
// $db_pass = "";
// $db_name = "voting";

// $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



