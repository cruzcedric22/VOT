<?php session_start();
 include('admin.php');
include('config.php'); 
// $elect_session = $_SESSION['is_election'];
// $filing_session = $_SESSION['is_filing'];
$user_cat = $_SESSION['cat_name'];

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
   $update_start1 = "UPDATE vot_session SET is_filing = 1";
   if($conn -> query($update_start1) == TRUE){
   $session_elect = "SELECT * FROM vot_session";
   if($exe2 = $conn ->query($session_elect)){   
    if($user_cat == 'Admin'){
    echo "<script> alert('Filing has started'); </script>";
    }
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
     if($user_cat == 'Admin'){
     echo "<script> alert('Filing has ended'); </script>";
     echo "<script> alert('Election has started'); </script>";
     }
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

}elseif($today >= $date3){
    $update_start1 = "UPDATE vot_session SET is_election = 0, is_filing = 0";
    if($conn -> query($update_start1) == TRUE){
    $session_elect = "SELECT * FROM vot_session";
    if($exe2 = $conn ->query($session_elect)){   
     if($user_cat == 'Admin'){
     echo "<script> alert('Election has ended'); </script>";
     }
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

// print_r($_SESSION['oldValue']);

$checkerQuery = "SELECT * FROM vot_session";
$checkerResult = $conn -> query($checkerQuery);

while($row9 = mysqli_fetch_assoc($checkerResult)){
   $checkDbFiling =  $row9['is_filing'];
   $checkDbElection = $row9['is_election'];

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
</head>
<body>
<div class="container-fluid px-4 align-content-center mt-5 pt-5">
                <h4>Settings:</h4>
                <div class="p-3 bg-white shadow-sm d-flex justify-content-center rounded">
                    <div>
                        <center>
                        <div class="row mb-2">
                        <?php if($user_cat == 'Admin'){ ?>
                            <div class="col">
                                
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#filingStart">
                                Election Time
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="filingStart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Election Time</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="session_filing.php" method="POST">
                                    <div class="modal-body">
                                         <!-- <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5>
                                            Are you sure you want to start the filing? -->
                                            <label for="" class="form-label">Start Filing</label>
                                            <input type="datetime-local" name="start_filing" class="form-control form-control-lg" value="">
                                            <label for="" class="form-label">End Filing</label>
                                            <input type="datetime-local" name="end_filing" class="form-control form-control-lg" value="">
                                            <label for="" class="form-label">End Election</label>
                                            <input type="datetime-local" name="end_elec" class="form-control form-control-lg" value=""> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_start_filing">Agree</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                
                                
                               
                               
                            </div> 
                            <?php } ?>
                            <div class="col">
                               
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#changePass">
                                Change Password 
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="changePass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Change Password:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="change_pass.php" method="POST">
                                        <label class="form-label">New Password:</label>
                                        <input type="password" class="form-control" name="change_pass" id="" required>
                                        <label class="form-label">Confirm Password:</label>
                                        <input type="password" class="form-control" name="change_pass_confirm" id="" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_change_pass">Confirm</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php //if($user_cat == 'Admin'){ ?>
                            <!-- <div class="col"> -->
                                
                                <!-- Button trigger modal -->
                                
                                <!-- <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#electionStart">
                                Start Election
                                </button> -->

                                <!-- Modal -->
                                <!-- <div class="modal fade" id="electionStart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Start Election:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> -->
                                    <!-- <div class="modal-body"> -->
                                        <!-- <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5> -->
                                            <!-- Are you sure you want to start the Election? -->
                                            <!-- <label for="" class="form-label">Start Election</label>
                                            <input type="datetime-local" name="start_elec" class="form-control form-control-lg" value="">
                                            <label for="" class="form-label">End Election</label>
                                            <input type="datetime-local" name="end_elec" class="form-control form-control-lg" value=""> -->
                                    <!-- </div> -->
                                    <!-- <div class="modal-footer">
                                        <form action="session_elec.php" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_start">Agree</button>
                                    </div>
                                    </div>
                                    </form> -->
                                <!-- </div>
                                </div>
                                 -->
                                
                                
                            <!-- </div> -->
                            <?php //} ?>
                            <div class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#delAcc">
                                Delete Account
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delAcc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Account:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="bi bi-exclamation-diamond" style="color: red;"></h5>
                                            Are you sure you want to delete this account?
                                    </div>
                                    <form action="del_acc.php" method="POST">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="btn_del_acc">Delete</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>

                            </div>
                        </div>
                        </center>
                    </div>
                    
                </div>
        
    </div>

    <script>
        $(document).ready(function(){

            var oldValfiling = <?php echo $checkDbFiling ?>;
            var oldValElection = <?php echo $checkDbElection ?>;

            console.log(oldValfiling);
            console.log(oldValElection);

            






        });
    </script>



</body>
</html>