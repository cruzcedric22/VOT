<?php session_start();
 include('admin.php');
include('config.php'); 
$elect_session = $_SESSION['is_election'];
$filing_session = $_SESSION['is_filing'];
$user_cat = $_SESSION['cat_name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
                                
                                <?php if($filing_session == 0){ ?>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#filingStart">
                                Start Filing
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="filingStart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Start Filing:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                         <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5>
                                            Are you sure you want to start the filing?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="session_filing.php" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_start_filing">Agree</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                <?php } ?>
                                
                                <?php if($filing_session == 1){ ?>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#filingStart">
                                End Filing
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="filingStart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Start Filing:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                         <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5>
                                            Are you sure you want to start the filing?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="session_filing.php" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_end_filing">Agree</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </form>
                                <?php } ?>
                               
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
                        <?php if($user_cat == 'Admin'){ ?>
                            <div class="col">
                                
                                <!-- Button trigger modal -->
                                <?php if($elect_session == 0) { ?>
                                <button type="button" class="btn btn-warning" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#electionStart">
                                Start Election
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="electionStart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Start Election:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5>
                                            Are you sure you want to start the Election?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="session_elec.php" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_start">Agree</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                <?php } ?>
                                <?php if($elect_session == 1){ ?>
                                <button type="button" class="btn btn-danger" style="color: black; font-weight: bold; height: 60px; width: 115px;" data-bs-toggle="modal" data-bs-target="#electionEnd">
                                End Election
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="electionEnd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Start Election:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="bi bi-exclamation-diamond" style="color: #F29E10;"></h5>
                                            Are you sure you want to start the Election?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="session_elec.php" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="btn_end">Agree</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                <?php } ?>
                                
                            </div>
                            <?php } ?>
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
</body>
</html>