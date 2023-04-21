<?php 
 include('voters.php');
include('config.php'); ?>


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
                                    <<form action="del_acc.php" method="POST">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="btn_del_acc">Delete</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>

                                
                             
                            </div> 
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
                                    <button type="button" class="btn btn-primary" name="btn_change_pass" onclick="changePassVoter()">Confirm</button>
                                    </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                                </div>
                            </div>
                        </div>
                    </center>
                    
                </div>
        
    </div>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

            $(document).ready(function(){















            });
         function showModal1(){
            $("#changePass").modal('show');
        };


        function changePassVoter(){
            var pass = $("#change_pass").val();
            var conpass = $("#change_pass_confirm").val();
           

            if(pass == "" && conpass == ""){
                Swal.fire(
                    'Warning',
                    'PLEASE INPUT ALL FIELDS',
                    'warning'
                    );

            }else{
                $.post("change_pass.php", {change_pass:pass,change_pass_confirm:conpass},function(response) {
                   var data = JSON.parse(response);
                   Swal.fire(data.title,data.message,data.icon);
                $("#change_pass").val("");
                $("#change_pass_confirm").val("");
                   $("#changePass").modal('hide');

                 
             });


            }

        };

        // function changePass(){
        //     var pass = $("#change_pass").val();
        //     var conpass = $("#change_pass_confirm").val();

        //     if(pass == "" && conpass == ""){
        //         Swal.fire(
        //             'Warning',
        //             'PLEASE INPUT ALL FIELDS',
        //             'warning'
        //             )

        //     }else{
        //         $.post("change_pass.php", {change_pass:pass,change_pass_confirm:conpass},function(response) {
        //            var data = JSON.parse(response);
        //            swal.fire(data.title,data.message,data.icon);

                 
        //      });


        //     }

            
           

        // };
    </script>
</body>
</html>