<?php session_start();
 include('voters.php'); 
 include('config.php');


$veriid =  $_SESSION['id'];
$veristdno = $_SESSION['student_no'];


$selectpos = "SELECT * FROM vot_position";
$result = mysqli_query($conn, $selectpos);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>
<body>
<div class="container-fluid px-5">
                <div class="d-flex justify-content-center">
                     <h1>VERIFICATION</h1>  
                </div> 
 <h3 class="d-flex justify-content-center">VOTE LIST</h3>
    <?php while($row = mysqli_fetch_assoc($result)){ $posid = $row['position_id'];?>
                <div class="p-3 bg-white shadow-sm rounded w-75 mx-5">
                    <h4><?php echo $row['pos_name']?></h4>
                    <?php $selectveri = "SELECT vot_users.id,vot_users.student_no,vot_user_profile.fname,vot_user_profile.student_no,vot_candidates.id,vot_candidates.partylist_id,vot_candidates.position_id,vot_candidates.name,vot_candidates.m_initial,vot_candidates.lname,vot_candidates.photo,vot_course.course_name,vot_user_votes.user_id,vot_party_list.party_name FROM vot_users,vot_user_profile,vot_candidates,vot_user_votes,vot_position,vot_course,vot_party_list WHERE (vot_user_votes.user_id = '$veriid' AND  vot_users.id = '$veriid') AND (vot_user_votes.user_vot = vot_candidates.id) AND (vot_candidates.position_id = '$posid' AND vot_position.position_id = '$posid') AND (vot_users.student_no = '$veristdno' AND vot_user_profile.student_no = '$veristdno') AND (vot_course.course_id = vot_candidates.course_id) AND (vot_candidates.partylist_id = vot_party_list.partylist_id)"; 
                    $result1 = mysqli_query($conn, $selectveri);
                    while($row1 = mysqli_fetch_assoc($result1)){?>
                    <div class="row">
                         <div class="col-2">
                            <img src="<?php echo "webimg/". $row1['photo'] ?>" class="img-responsive img-thumbnail" height="150" width="150" alt="">
                        </div>
                        <div class="col-3 w-auto">
                        <h4 class="mb-0 pb-0" style="color:#FD8419 ;"><?php echo $row1['name'].' '.$row1['m_initial'].' '.$row1['lname'] ?></h4>
                        <h5 class="mb-0 pb-0"><?php echo $row1['course_name'] ?></h5>
                        <h5 class="mb-0 pb-0"><?php echo $row1['party_name'] ?></h5>
                        </div>
                    </div>
                    
                    <?php } ?>
                    
                </div>
                <?php } ?>
        
    </div>
     <div class="mb-2"></div>
    
</body>
</html> 