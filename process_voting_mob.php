<?php
include('config.php');
session_start();

if(isset($_POST['post']) && $_POST['post'] == 'votMobile'){
    $msg = array();


     $can_id = $_POST['can_id'];
     $voters_id = $_POST['voters_id'];
     $voters_username = $_POST['voters_username'];
    $can_id_arr = explode(',',$can_id);
    
   
      
        for($i =0; $i<sizeof($can_id_arr); $i++){

            $qtyout = $val;
            $count = count(array($qtyout));
            
            // print_r($qtyout);
            $votes = "UPDATE vot_candidates SET cand_votes = cand_votes + 1 WHERE id = '$can_id_arr[$i]'";
             $result1 = $conn->query($votes);

             $user_vot = "INSERT INTO vot_user_votes (user_id,user_vot) VALUES ('$voters_id', '$can_id_arr[$i]')";
             $conn->query($user_vot);
             }
             
             $insert_logs = "INSERT INTO vot_logs (user_id, action) VALUES ($voters_id, '$voters_username has voted')";
             $result2 = $conn -> query($insert_logs);
            // $user_id = $_SESSION['id'];
            // $_SESSION['isvoted'] = 1;
            $updatevoted = "UPDATE vot_users SET is_voted = 1 WHERE id = '$voters_id'";
            $executeUpdate = mysqli_query($conn, $updatevoted);
            
       
            $msg['result'] =  "success";
         

            echo json_encode($msg);
            


}