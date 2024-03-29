<?php
  include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="css/style1.css" /> -->
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- login CSS -->
    <link rel="stylesheet" href="css/regis.css">
  <style>
    .validationText{
      font-size: small;
      text-align: left;
      padding: 0;
      margin: 0;
    }
    .register-text{
      color: #ff7b00;
    }
  </style>
</head>
<body>
<?php
// $username = $_POST['username'];
// $password = sha1($_POST['pass']);

// $sql = "select * from users where username = '$username' and password = 'sha1($password)' limit 1 ";

// $stmtselect =  $db -> prepare($sql);
// $result = $stmtselect -> execute([$username, $password]);

$dropcourse = "SELECT * FROM vot_course";
$result2 = mysqli_query($conn,$dropcourse);



// if($result){
//         $user = $stmtselect ->fetch(PDO::FETCH_ASSOC);
//         if($stmtselect->rowCount() > 0){
//             echo '1';
//         }else{
//             echo 'there are no user';  
//         }
// }

?>

<center>
        <div class="container register">
        <form id="registerForm" class="main-form text-center" method="post">
            <div class="card container register-container bg-light shadow">
                <label for="" class="register-text">Registration</label>

                <!-- student no. and course -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="stdno" name="stdno" placeholder="Student No." onkeyup="validationRegis()">
                                <p class="validationText" id="txtStdnoVal"></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select  id="course" class="form-control form-control-lg" name="course" onchange="alertcourse()">
                                <?php foreach($result2 as $row1){
                                            ?>
                                                <option value="<?php echo $row1['course_id'];?>"><?php echo $row1['course_name'];?></option>
                                            <?php
                                        } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- name (first name, middle initial, last name) -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="fname" name="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="miniital" name="m_initial" placeholder="Middle Initial">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="lname" name="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- email and username -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Email"> 
                                <p class="validationText" id="txtEmailVal"></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- password and confirm password -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" name="pass" id="pass" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="pass1" name="con_pass" placeholder="Confirm Password">
                                <p class="validationText" id="txtPassVal"></p>
                            </div>
                        </div>
                    </div>
                </div>
          </form>
                
                <!-- register button and login here link -->
                <div class="form-group">
                    <button type="button" class="btn btn-lg w-100 shadow-sm" id="regis" name="regis">Register</button>
                </div>
                <div class="form-group">
                    <label for="" class="account">Have an account already? <a href="index.php" class="login-link">Login here.</a></label>
                </div>
            </div>
        </div>
    </center>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  // var returnVar;
        $(document).ready(function(){
          $('#regis').prop('disabled', true);
          $('#regis').css('pointer-events', 'none');
          $('#regis').css('opacity', '0.2');
        
        });
        
        
        
        $(function(){
              $('#regis').click(function(e){


                  var valid = this.form.checkValidity();
                  if(valid){
                  
                  var params = $('#registerForm').serialize();
                    e.preventDefault();
                    $.post('process.php',params).then(response=>{
                      var data = JSON.parse(response)
                      console.log(data);
                      
                      if(data.exist){
                        swal.fire(data.title,data.message,data.icon);

                        // $('#stdno').val("");
                        // $('#fname').val("");
                        // $('#miniital').val("");
                        // $('#lname').val("");
                        // $('#email').val("");
                        // $('#username').val("");
                        // $('#pass').val("");
                        // $('#pass1').val("");
                        // $('#stdno').css('background-color', '#FFFFFF');
                        // $('#email').css('background-color', '#FFFFFF');
                        // $('#pass').css('background-color', '#FFFFFF');
                        // $('#pass1').css('background-color', '#FFFFFF');
                        $('#regis').prop('disabled', true);
                        $('#regis').css('pointer-events', 'none');
                        $('#regis').css('opacity', '0.2');
                        
                        // setTimeout(() => {
                        //   window.location.href = "regis.php"
                        // },2000);
                        
                      }else{
                        swal.fire(data.title,data.message,data.icon);
                        setTimeout(() => {
                          // window.location.href = "index.php"
                          // console.log(data);
                        },2000);

                      }
                    });


                    
                  }else{
                    Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'PLEASE INPUT CREDENTIALS',
                            showConfirmButton: true
                            })
                        // setTimeout(() => {
                        //   window.location.href = "regis.php"
                        //   console.log(data);
                        // },2000);
                        // $('#stdno').val("");
                        // $('#fname').val("");
                        // $('#miniital').val("");
                        // $('#lname').val("");
                        // $('#email').val("");
                        // $('#username').val("");
                        // $('#pass').val("");
                        // $('#pass1').val("");
                        // $('#stdno').css('background-color', '#FFFFFF');
                        // $('#email').css('background-color', '#FFFFFF');
                        // $('#pass').css('background-color', '#FFFFFF');
                        // $('#pass1').css('background-color', '#FFFFFF');
                        // $('#username').css('background-color', '#FFFFFF');
                        $('#regis').prop('disabled', true);
                        $('#regis').css('pointer-events', 'none');
                        $('#regis').css('opacity', '0.2');
                  }

              });
              
           
              
            });

            function validationRegis(){
              // $('#txtStdnoVal').html("gdasgas");
              var stdnoData = $('#stdno').val();
              // console.log(stdnoData);
              // console.log(stdnoData);
              if(stdnoData == ""){
                $('#stdno').css('background-color', '#FFFFFF');
                $('#txtStdnoVal').html("");
                $('#regis').prop('disabled', true);
                $('#regis').css('pointer-events', 'none');
                $('#regis').css('opacity', '0.2');


              }else{
                $.ajax({
                url:"validRegis.php",
                method:"POST",
                data:{stdnoData:stdnoData},
                success:function(data)
                {
                var data = JSON.parse(data);
                // console.log(data);
                //  returnVar = data; 
                if(data == "valid"){
                  $('#stdno').css('background-color', '#E4F9E0');
                  $('#txtStdnoVal').html("");


                }else{
                  $('#stdno').css('background-color', '#F7AA97');
                  $('#txtStdnoVal').html("Student number is already registered");
                  $('#txtStdnoVal').css('color', 'red');
                  $('#regis').prop('disabled', true);
                  $('#regis').css('pointer-events', 'none');
                  $('#regis').css('opacity', '0.2');
                }
                
                // var data = JSON.parse(data);
                // $('#edt_photo').val('');
                // $('#edit_btn').modal('hide');
                // swal.fire(data.title,data.message,data.icon);
                // $('#table_can').DataTable().ajax.reload();
              }
                   });
                
              }

            
            }

            function validationUsernameRegis(){
              var username = $('#username').val();

              if(username == ""){
                $('#username').css('background-color', '#FFFFFF');
                $('#txtUsernameVal').html("");
              }else{
                $.ajax({
                url:"validRegis.php",
                method:"POST",
                data:{username:username},
                success:function(data)
                {
                var data = JSON.parse(data);
                // console.log(data);
                //  returnVar = data; 
                if(data == "valid"){
                  $('#username').css('background-color', '#E4F9E0');
                  $('#txtUsernameVal').html("");


                }else{
                  $('#username').css('background-color', '#F7AA97');
                  $('#txtUsernameVal').html("Username Already Taken");
                  $('#txtUsernameVal').css('color', 'red');
                  $('#regis').prop('disabled', true);
                  $('#regis').css('pointer-events', 'none');
                  $('#regis').css('opacity', '0.2');
                }
                
                }
                   });
              }
              
            };

            function validationEmailRegis(){

              var emailData = $('#email').val();
            
              if(emailData == ""){
                $('#email').css('background-color', '#FFFFFF');
                $('#txtEmailVal').html("");
                $('#regis').prop('disabled', true);
                $('#regis').css('pointer-events', 'none');
                $('#regis').css('opacity', '0.2');


              }else{
                $.ajax({
                url:"validRegis.php",
                method:"POST",
                data:{emailData:emailData},
                success:function(data)
                {
                var data = JSON.parse(data);
                // console.log(data);
                //  returnVar = data; 
                if(data == "valid"){
                  $('#email').css('background-color', '#E4F9E0');
                  $('#txtEmailVal').html("");


                }else{
                  $('#email').css('background-color', '#F7AA97');
                  $('#txtEmailVal').html("Email is already registered");
                  $('#txtEmailVal').css('color', 'red');
                  $('#regis').prop('disabled', true);
                  $('#regis').css('pointer-events', 'none');
                  $('#regis').css('opacity', '0.2');
                }
                
                }
                   });

              }
            }

            function validateRegisForm(){
              var fname = $('#fname').val();
              var mname = $('#miniital').val();
              var lname = $('#lname').val();       
              var pass = $('#pass').val();
              var conpass = $('#pass1').val();
              var stdnoData1 = $('#stdno').val();
              var emailData1 = $('#email').val();
              var username = $('#username').val();

              if(pass == conpass){
                $('#pass').css('background-color', '#E4F9E0');
                $('#pass1').css('background-color', '#E4F9E0');
                $('#txtPassVal').html("");
                // lahat ng input fields dapat di empty
                if((stdnoData1 != "" && fname != "") && (mname != "" && lname != "") && (emailData1 != "" && username != "") && (pass != "" && conpass != "")){
                //lagyan ng settimeout na magchecheck sakanya
                setTimeout(validateRegisForm,2000);
                
               
                  $.post("validation_regis.php", {stdnoData1:stdnoData1,emailData1:emailData1,username:username}).then(data => {
                    var data = JSON.parse(data);
                    // alert(data);
                    if(data == "valid"){
                      // alert("dito");
                      $('#regis').prop('disabled', false);
                      $('#regis').css('pointer-events', 'auto');
                      $('#regis').css('opacity', '1');
                      
                    }else{
                      $('#regis').prop('disabled', true);
                      $('#regis').css('pointer-events', 'none');
                      $('#regis').css('opacity', '0.2');
                    }
                  });
                
                

              }else{
                if(pass == ""){
                  
                $('#pass').css('background-color', '#FFFFFF');
                // $('#txtPassVal').html("");
              } 
              if(conpass == "")
              {
                $('#pass1').css('background-color', '#FFFFFF');
                $('#txtPassVal').html("");
              }

              }
              

              }else{
                $('#pass').css('background-color', '#F7AA97');
                $('#pass1').css('background-color', '#F7AA97');
                $('#txtPassVal').html("Password didn'nt match");
                $('#txtPassVal').css('color', 'red');

              }

              function alertcourse(){
                alert($("#"))
              }

              

              
          
             
            }

          </script>
<!-- <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
<!-- <script src="js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="js/bootsrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> -->
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>    

  
</body>
</html>