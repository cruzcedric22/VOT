<?php
include('config.php');
session_start();

if(isset($_POST['submit'])){
     $qty = $_POST;
    
     $log_id = $_SESSION['id'];
     $log_username = $_SESSION['username'];
    
   
      
        foreach ($qty as $val){

            $qtyout = $val;
            $count = count(array($qtyout));
            
            // print_r($qtyout);
            $votes = "UPDATE vot_candidates SET cand_votes = cand_votes + 1 WHERE id = '$qtyout'";
             $result1 = $conn->query($votes);

             $user_vot = "INSERT INTO vot_user_votes (user_id,user_vot) VALUES ('$log_id', '$qtyout')";
             $conn->query($user_vot);
             }
             
             $insert_logs = "INSERT INTO vot_logs (user_id, action) VALUES ($log_id, '$log_username has voted')";
             $result2 = $conn -> query($insert_logs);
            $user_id = $_SESSION['id'];
            $_SESSION['isvoted'] = 1;
            $updatevoted = "UPDATE vot_users SET is_voted = 1 WHERE id = '$user_id'";
            $executeUpdate = mysqli_query($conn, $updatevoted);
            echo "<script>setTimeout(() => {
                        window.location.href = 'voters.php'
                },1);</script>";
     

  

        

       
        
    // $votpres = $_POST['vot_pres'];
    // $votvice = $_POST['vot_vice'];
    // $votsec = $_POST['vot_sec'];
    // $vottre = $_POST['vot_tre'];
    // $votaud = $_POST['vot_aud'];
    // $votpio = $_POST['vot_pio'];
    // $msg = array();

    // if(isset($votpres)){
    // $vot_pres = "UPDATE candidates SET cand_votes = cand_votes + 1 WHERE id = '$votpres'";
    // $result1 = $conn->query($vot_pres);
    // }else{
    //         // echo "<script> alert('PICK A VOTE FOR PRESIDENT'); </script>";
    // }
    // if(isset($votvice)){
    //     $vot_vice = "UPDATE candidates SET cand_votes = cand_votes + 1 WHERE id = '$votvice'";
    //     $result1 = $conn->query($vot_vice);
    // }else{
    //             // echo "<script> alert('PICK A VOTE FOR VICE_PRESIDENT'); </script>";
    // }
    // if(isset($votsec)){
    //     $vot_sec = "UPDATE candidates SET cand_votes = cand_votes + 1 WHERE id = '$votsec'";
    //     $result1 = $conn->query($vot_sec);
    // }else{
    //             // echo "<script> alert('PICK A VOTE FOR SECRETARY'); </script>";
    // }
    // if(isset($vottre)){
    //     $vot_tre = "UPDATE candidates SET cand_votes = cand_votes + 1 WHERE id = '$vottre'";
    //     $result1 = $conn->query($vot_tre);
    // }else{
    //             // echo "<script> alert('PICK A VOTE FOR TREASURER'); </script>";
    // }
    // if(isset($votaud)){
    //     $vot_tre = "UPDATE candidates SET cand_votes = cand_votes + 1 WHERE id = '$votaud'";
    //     $result1 = $conn->query($vot_tre);
    // }else{
    //             // echo "<script> alert('PICK A VOTE FOR AUDITOR'); </script>";
    // }
    // if(isset($votpio)){
    //     $vot_pio = "UPDATE candidates SET cand_votes = cand_votes + 1 WHERE id = '$votpio'";
    //     $result1 = $conn->query($vot_pio);
    // }else{
    //             // echo "<script> alert('PICK A VOTE FOR P.I.O'); </script>";
    // }

    // ///echo $votpres. ' ' . $votvice . ' ' . $votsec . ' ' .$vottre. ' '. $votaud. ' '. $votpio ;
    // //LOG OUT SESSION UNSET && SESSION DESTROY

    // $insertvotes = "INSERT INTO user_votes (userid,vot_pres,vot_vice,vot_sec,vot_tre,vot_aud,vot_pio) 
    // VALUES ('$user_id', '$votpres', '$votvice', '$votsec' , '$vottre' , '$votaud' , '$votpio')";
    // $executeInsert = mysqli_query($conn, $insertvotes);



   
    // $msg['title'] = "SUCCESSFUL";
    // $msg['message'] =  "YOUR VOTE WILL BE CAST";
    // $msg['icon'] =  "success";
    

    // echo json_encode($msg);
    


}