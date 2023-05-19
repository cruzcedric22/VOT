<?php
include('config.php');
session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $candidateIds = $_POST["candidate_id"];
    $log_username = $_SESSION['username'];
    $log_id = $_SESSION['id'];

    
    // Process the submitted candidate IDs as needed

    $stmt = $conn->prepare("INSERT INTO vot_user_votes (user_id,user_vot) VALUES (?,?)");
    
    // Example: Print the submitted candidate IDs
    foreach ($candidateIds as $candidateId) {

                    $votes = "UPDATE vot_candidates SET cand_votes = cand_votes + 1 WHERE id = '$candidateId'";
                    $result1 = $conn->query($votes);
        
                    $stmt->bind_param("ss", $log_id, $candidateId);
                    $stmt->execute();
                     }
                     $stmt->close();
                     
                     $insert_logs = "INSERT INTO vot_logs (user_id, action) VALUES ($log_id, '$log_username has voted')";
                     $result2 = $conn -> query($insert_logs);
                   
                    $user_id = $_SESSION['id'];
                    $_SESSION['isvoted'] = 1;
                    $updatevoted = "UPDATE vot_users SET is_voted = 1 WHERE id = '$user_id'";
                    $executeUpdate = mysqli_query($conn, $updatevoted);
                    
                    $msg['title'] = "Successful";
                    $msg['message'] =  "Successfully Voted";
                    $msg['icon'] =  "success";
        
                    echo json_encode($msg);
                    
        
      
    }
  