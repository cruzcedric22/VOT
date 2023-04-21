<?php 
// session_start();
 include('admin.php');
include('config.php'); 
// error_reporting(0);
// $elect_session = $_SESSION['is_election'];
// $filing_session = $_SESSION['is_filing'];
$user_cat = $_SESSION['cat_name'];

// echo $user_cat;




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
    // echo "<script> alert('Filing has started'); </script>";
    // $alertbody = "Filing has started";
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
    //  echo "<script> alert('Filing has ended'); </script>";
    //  echo "<script> alert('Election has started'); </script>";
    //  $alertbody = "Election has started";
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
    //  echo "<script> alert('Election has ended'); </script>";
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

if($checkDbFiling == 1 && $checkDbElection == 0){
    $alertbody = "Filing is ongoing";
}elseif($checkDbFiling == 0 && $checkDbElection == 1){
    $alertbody = "Election is ongoing";
}elseif($checkDbFiling == 0 && $checkDbElection == 0){
    $alertbody = "Set dates of election process";
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
    <style>
        .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        /* margin-bottom: 0; */
        margin-right: 15px;
        float:right;
        /* z-index: 2; */
        }
        .alert.info {background-color: #6DB0E2;}
    </style>
</head>
<body>
            <div class="row">
                    <div class="col" id="alert">
                    <div class="alert info"> <i class="bi bi-info-circle-fill"></i> <b id="bodyalert"></b></div>

                    </div> 
                </div>
<div class="container-fluid px-4 align-content-center mt-5 pt-5">
    
                        
                <h4>Settings:</h4>
              
                <div class="p-3 bg-white shadow-sm d-flex justify-content-center rounded">
                    <div>
                        <center>
                        <div class="row mb-2">
                        <?php if($user_cat == 'Admin'){ ?>
                            <div class="col">
                                
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-target="#filingStart" onclick="showModal()">
                                Election Time
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="filingStart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Election Time</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="session_filing.php" id="formDate" method="POST">
                                    <div class="modal-body">
                                         <!-- <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5>
                                            Are you sure you want to start the filing? -->
                                            <label for="" class="form-label">Start Filing</label>
                                            <input type="datetime-local" name="start_filing" id="start_filing" class="form-control form-control-lg" value="">
                                            <label for="" class="form-label">End Filing</label>
                                            <input type="datetime-local" name="end_filing" id="end_filing" class="form-control form-control-lg" value="">
                                            <label for="" class="form-label">End Election</label>
                                            <input type="datetime-local" name="end_elec" id="end_elec" class="form-control form-control-lg" value=""> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" name="btn_start_filing" onclick="electionDate()">Agree</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                
                                
                               
                               
                            </div> 
                            <?php } ?>
                            <div class="col">
                               
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-target="#changePass" onclick="showModal1()">
                                Change Password 
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="changePass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Change Password:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <form action="change_pass.php" method="POST"> -->
                                        <label class="form-label">New Password:</label>
                                        <input type="password" class="form-control" name="change_pass" id="change_pass" required>
                                        <label class="form-label">Confirm Password:</label>
                                        <input type="password" class="form-control" name="change_pass_confirm" id="change_pass_confirm" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" name="btn_change_pass" onclick="changePass()">Confirm</button>
                                    </div>
                                    </div>
                                    <!-- </form> -->
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
                                <div class="modal-dialog modal-dialog-centered">
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

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function(){

            var oldValfiling = <?php echo $checkDbFiling ?>;
            var oldValElection = <?php echo $checkDbElection ?>;

            console.log(oldValfiling);
            console.log(oldValElection);

            // var start_filing = $("#start_filing").val();
            // var end_filing = $("#end_filing").val();
            // var end_elec = $("#end_elec").val();
            var alertbody = <?php echo json_encode($alertbody); ?>;

            // var alertbody2 = JSON.parse(alertbody);

           
            


           
           $('#bodyalert').html(alertbody);
            $("#alert").fadeOut(3000, function(){ $(this).remove();});
           
           








        });

        function showModal1(){
            $("#changePass").modal('show');
        };

        function changePass(){
            var pass = $("#change_pass").val();
            var conpass = $("#change_pass_confirm").val();

            if(pass == "" && conpass == ""){
                Swal.fire(
                    'Warning',
                    'PLEASE INPUT ALL FIELDS',
                    'warning'
                    )

            }else{
                $.post("change_pass.php", {change_pass:pass,change_pass_confirm:conpass}, function(response) {
                   var data = JSON.parse(response);
                   Swal.fire(data.title,data.message,data.icon);
                   $("#change_pass").val("");
                   $("#change_pass_confirm").val("");
                   $("#changePass").modal('hide');

                 
             });


            }

            
           

        };

        function showModal(){
            $("#filingStart").modal('show');
        };

            
            function electionDate() {
                var form_data = $('#formDate').serialize();

                $.post("session_filing.php", form_data, function(response) {
                    var data = JSON.parse(response);
                    if(data.status == "success"){
                        $("#filingStart").modal('hide');
                        swal.fire(data.title,data.message,data.icon);
                    }else{
                        swal.fire(data.title,data.message,data.icon);
                    }
                });
                }
    </script>



</body>
</html>