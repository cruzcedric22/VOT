<?php
  session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  include('config.php');

  if(isset($_POST)){

	// $user_log = $_SESSION['username'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
	$miinitial = $_POST['m_initial'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
	$con_pass = $_POST['con_pass'];
    $course = $_POST['course'];
    $studentno = $_POST['stdno'];
    $encrypt_pass = sha1($password);
	$msg = array();

	// $query = "SELECT ytoovumw_bscs3a.vot_users.username, ytoovumw_bscs3a.vot_user_profile.fname, ytoovumw_bscs3a.vot_user_profile.student_no FROM vot_users, vot_user_profile WHERE (ytoovumw_bscs3a.vot_users.username ='$username' OR ytoovumw_bscs3a.vot_user_profile.fname = '$fname') AND ytoovumw_bscs3a.vot_user_profile.student_no = '$studentno'";
	// $u = $conn -> query($query); // for the hosting

	if($password == $con_pass){
	$query = "SELECT vot_users.username,vot_user_profile.fname,vot_user_profile.student_no FROM vot_users, vot_user_profile WHERE vot_users.username ='$username' OR vot_user_profile.student_no = '$studentno'";
	$u = $conn -> query($query);

	if(mysqli_num_rows($u) > 0){
		$msg['title'] = "ERROR";
		$msg['message'] =  "USER ALREADY EXIST";
		$msg['icon'] =  "warning";
		$msg['exist'] = true;

	}else{
		// $sql = "insert into ytoovumw_bscs3a.vot_users (category_id, username,password, student_no) values ('1','$username','$encrypt_pass','$studentno')";
		// $sql1 = "insert into ytoovumw_bscs3a.vot_user_profile (fname,email,course,student_no) values ('$fname','$email','$course','$studentno')"; // for hosting
				// $curr_year =date('Y',time());
                $query = "SELECT * FROM vot_year WHERE status = 1";
                $exe = $conn->query($query);
                while($row = mysqli_fetch_array($exe)){
                    $year_id = $row['id'];
                }


		$sql = "insert into vot_users (category_id, username,password, student_no) values ('1','$username','$encrypt_pass','$studentno')";
		$sql1 = "insert into vot_user_profile (fname,m_initial,lname,email,course_id,student_no,year_id) values ('$fname','$miinitial','$lname','$email','$course','$studentno','$year_id')";
		// $sql2 = "insert into vot_logs (user_id,action) values ('$log_id', 'Staff $user_log inserted a voter') ";
    	if ($conn->query($sql) == TRUE & $conn->query($sql1) == TRUE) {

			 //Load Composer's autoloader
			 require 'vendor/autoload.php';
			 //Create an instance; passing `true` enables exceptions
			 $mail = new PHPMailer(true);
			 $mail->isHTML(true); 
			 //Server settings
			 $mail->SMTPDebug  = SMTP::DEBUG_OFF;                        //Enable verbose debug output
			 $mail->isSMTP();                                            //Send using SMTP
			 $mail->Host = 'mail.ucc-csd-bscs.com';		                //Set the SMTP server to send through
			 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			 $mail->Username   = 'vot@ucc-csd-bscs.com';              //from //SMTP username
			 $mail->Password   = ';)TWm(@I4{dr';                         //SMTP password
			 $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
			 $mail->Port       =  465;       
			 //Recipients
			 $mail->setFrom('vot@ucc-csd-bscs.com', 'VOT');
			 $mail->addAddress("$email");                                //sent to
			 //Content
			 $mail->Subject = 'Verification';
			 $mail->Body    = '<html><body><h1>Dear '.$fname.',</h1>
			 				<div style="width: 100%; text-align: center;">
							<p>To complete your registation, please verify your email address by clicking the link below:</p>
							<form method="post" action="verify_email.php">
								<input type="text" id="stdno" name="stdno" value = '.$studentno.' style="display:none">
								<button type="submit" class="btn btn-success" name="submit" style="text-decoration: none; color: white; background-color: #03C988;">VERIFY APPOINTMENT</button>
								</form>
								<p>Thank you,</p>
								<p class = "mb-3">University Of Caloocan City</p>

								<strong>*** This is an auto-generated email. PLEASE DO NOT REPLY TO THIS MESSAGE ***</strong><br>
							</div>
			 				  </body></html>
			 					';
			 $mail->send();
		//echo "New record created successfully";
		$msg['title'] = "Successful";
		$msg['message'] =  "Successfully Registered";
		$msg['icon'] =  "success";
		$msg['exist'] = false;
		// $msg= "REGISTERED SUCCESSFULLY";
		}else {
			$msg= "Error:"  . $sql . "<br>" . $conn->error;
		}
		}
	}else{
		$msg['title'] = "ERROR";
		$msg['message'] =  "PASSWORD DIDN'T MATCH";
		$msg['icon'] =  "warning";
		$msg['exist'] = true;
	}
    $conn->close();
	echo json_encode($msg);
}




// require_once('config.php');



// if(isset($_POST)){

// 	$username = $_POST['username'];
//     $fname = $_POST['fname'];
//     $email = $_POST['email'];
//     $password = $_POST['pass'];
//     $course = $_POST['course'];
//     $studentno = $_POST['stdno'];
//     $encrypt_pass = sha1($password);

// 		$sql = "insert into users(category_id, username, fname, email, password, course, student_no) values ('1','$username','$fname','$email','$encrypt_pass','$course','$studentno')";
// 		$stmtinsert = $db->prepare($sql);
// 		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
// 		if($result){
// 			echo 'Successfully saved.';
// 		}else{
// 			echo 'There were erros while saving the data.';
// 		}
// }else{
// 	echo 'No data';
// }
