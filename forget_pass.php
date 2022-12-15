<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    // include('query.php');
    include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js2/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js2/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="icon" href="favicon.ico">
    <style>
        body{
            background-color:#FCE8D2;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <button class="btn btn-lg btn-primary col-2 mb-5" id="back"><i class="bi bi-arrow-left-short"></i> Back</button>
            <h4 style="color: #495057;">Forgot Password</h4>
            <form method="post" class="form1 col-12">
                <input type="text" name="email" placeholder="Enter your email" class="form-control form-control-lg mb-3" required>
                <button type="submit" name="submit" class="btn btn-success btn-lg col-2 mb-3"><i class="bi bi-file-arrow-up"></i> Submit</button>
            </form>
        </div>
    </div>

    <!-- Enter forgetPasswordOtp -->
    <div class="modal fade" role="dialog" id="forgetPassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <form method="post" class="form-group">
                        <input type="text" class="form-control form-control-lg mb-3" name="forgetPasswordOtp" placeholder="Enter OTP" required>
                        <button type="submit" class="btn btn-lg btn-success col-12" name="forgetPasswordOtpSubmit"><i class="bi bi-file-arrow-up"></i> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enter New Password -->
    <div class="modal fade" role="dialog" id="newPassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <form method="post" class="form-group">
                        <input type="password" class="form-control form-control-lg mb-3" name="newPass" placeholder="Enter new password" required>
                        <button type="submit" class="btn btn-lg btn-success col-12" name="newPassSubmit"><i class="bi bi-file-arrow-up"></i> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $_SESSION['email'] = $email = $_POST['email'];
        $name = '';
        $query = "select * from vot_user_profile where email = '$email' ";
        $exe2 = $conn ->query($query);
            while($row = mysqli_fetch_assoc($exe2)){
                $name = $row['email'];
                $stdno = $row['student_no'];
                 $_SESSION['stdno'] = $stdno;
            }
        if($name == null){
            echo "<script>
            alert('EMAIL DO NOT EXIST!');
            windown.location.replace('forget_pass.php');
            </script>"; 
            return;
        }
        //email exist
        else{
            $forgetPasswordOtp = uniqid();
            $queryInsertForgetPasswordOtp = "UPDATE vot_users SET otp = '$forgetPasswordOtp' WHERE student_no='$stdno' ";   
            if($conn -> query($queryInsertForgetPasswordOtp)){
                echo "<script>$('#forgetPassModal').modal('show');</script>";
                //Load Composer's autoloader
                require 'vendor/autoload.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug  = SMTP::DEBUG_OFF;                        //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'mail.ucc-csd-bscs.com';		                //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'vot@ucc-csd-bscs.com';              //from //SMTP username
                $mail->Password   = '3n!^X0rzvV+v';                         //SMTP password
                $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
                $mail->Port       =  465;       
                //Recipients
                $mail->setFrom('vot@ucc-csd-bscs.com', 'VOT');
                $mail->addAddress("$email");                                //sent to
                //Content
                $mail->Subject = 'Forget Password OTP:';
                $mail->Body    = "Good Day, $name \n \nWe would like to inform you that you're trying to change your password. \nTo confirm please use this OTP: $forgetPasswordOtp \n \nThank You!";
                $mail->send();
            }
        }
    }
    //submit forget pass otp
    if(isset($_POST['forgetPasswordOtpSubmit'])){
        $forgetPasswordOtp = $_POST['forgetPasswordOtp'];
        $selectForgetPassOtp = "select otp from vot_users  where otp = '$forgetPasswordOtp' ";
        $result1 = $conn -> query($selectForgetPassOtp);
        //check if otp match
        if($result1 -> num_rows == 0){
            echo "<script>
            alert('Forget Password otp not match!');
            window.location.replace('forget_pass.php');
            </script>"; 
            return;
        }
        //otp match
        else{
            echo "<script>$('#newPassModal').modal('show');</script>";
        }
    }

    // submit new pass
    if(isset($_POST['newPassSubmit'])){
        $email = $_SESSION['email'];
        $password = $_POST['newPass'];
        $hash = sha1($password);
        $queryNewPass = "update vot_users set password = '$hash' where student_no = '$_SESSION[stdno]' ";
        if($conn ->query($queryNewPass)){
            echo "<script>
            alert('Update Pass Sucess!');
            window.location.replace(index.php);
            </script>";
        }
        else{
            echo "<script>
            alert('Update Pass Unsucess!');
            window.location.replace(forget_pass.php);
            </script>";
        }
    }

?>
<script>
    document.getElementById("back").onclick = function() {
        window.location.replace('index.php');
    };
</script>
