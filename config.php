<?php

$severname = 'localhost';
$db_user = 'ytoovumw_bscs3a';
$db_pass = 'kaAGi]gz8H2*';
$db_name = 'ytoovumw_bscs3a';

$conn = new mysqli($severname,$db_user,$db_pass,$db_name);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($conn -> connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$curr_year =date('Y',time());
$query = "SELECT * FROM vot_year WHERE year = '$curr_year'";
$exe = $conn->query($query);
while($row = mysqli_fetch_array($exe)){
     $year_id = $row['id'];
}


$curr_time =date('Y',time());
$query = "SELECT * FROM vot_year WHERE year = '$curr_time'";
if($output = $conn -> query($query)){
    if($output -> num_rows > 0){
        
    }else{
        $inserttime = " INSERT INTO vot_year(year) VALUES ('$curr_time') ";
        if($conn -> query($inserttime) == TRUE) {

        }else{
            die($conn->error);
        }
    }
}

$adminpass = sha1("admin");
$selectquery = "SELECT * FROM vot_users WHERE username = 'admin'";
if($result = $conn->query($selectquery)){
    if($result -> num_rows > 0)
        return;
    else{
        $insertAdmin = "INSERT INTO vot_users(category_id,username,password,student_no) VALUES ('3','admin','$adminpass','1')";
        $insertAdmin1 = "INSERT INTO vot_user_profile(fname,m_initial,lname,email,course_id,student_no,year_id) VALUES ('admin','admin','admin','admin','1','1','$year_id')";
        
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



