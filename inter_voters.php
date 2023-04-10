<?php 
include("config.php");


$data = array();

$user_id = $_POST['user_id'];

$queryFiled = "SELECT is_filing, is_voted FROM vot_users WHERE id = '$user_id'";
$res = $conn -> query($queryFiled);
while($row6 = mysqli_fetch_assoc($res)){  
    $data['user_filing'] = $row6['is_filing'];
    $data['user_voted'] = $row6['is_voted'];
}

$session_elect = "SELECT * FROM vot_session";
$exe2 = $conn ->query($session_elect);
    while($row = mysqli_fetch_assoc($exe2)){
        $data['session_filing'] = $row['is_filing'];
        $data['session_voting'] = $row['is_election'];
    }

echo json_encode($data);



?>