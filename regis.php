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
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style1.css" />
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

<div class="container">
                <div class="card regis" style="height: fit-content;">
                    <div class="card-body">
                        <div class="circle"></div>
                        <header class="myHed text-center">
                          <p>Registration</p>
                        </header>
                        <form id="registerForm" class="main-form text-center" method="post">
                            <div class="form-group">
                                <label class="form-label" style="color: #ECE9E9;">Student Number:</label>
                                    <input type="text" class="form-control" id="stdno" name="stdno" placeholder="STUDENT NO:" required> <!-- FOR STUDENT NO/ -->
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="color: #ECE9E9;">Given Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="NAME" required> <!-- FOR NAME -->
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="color: #ECE9E9;">Middle Initial:</label>
                                    <input type="text" class="form-control" id="miniital" name="m_initial" placeholder="MIDDLE INITIAL" required> <!-- FOR MIDDLE INITIAL -->
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="color: #ECE9E9;">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="LAST NAME" required> <!-- FOR MIDDLE INITIAL -->
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="color: #ECE9E9;">Course:</label>
                                <select class="form-select" name="course" aria-label="Default select example">
                                    
                                       <?php foreach($result2 as $row1){
                                            ?>
                                                <option value="<?php echo $row1['course_id'];?>"><?php echo $row1['course_name'];?></option>
                                            <?php
                                        } ?>
                                      
                                        </select> <!-- FOR COURSE -->
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="color: #ECE9E9;">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required> <!-- FOR EMAIL -->
                            </div>
                            <div class="form-group" style="color: #ECE9E9;">
                                <label class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="USERNAME" required> <!-- FOR USERNAME -->
                            </div>
                            <div class="form-group" style="color: #ECE9E9;">
                                <label class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="PASSWORD" required> <!-- FOR PASSWORD -->
                            </div>
                            <div class="form-group" style="color: #ECE9E9;">
                                <label class="form-label">Confirm password:</label>
                                    <input type="password" class="form-control" id="pass1" name="con_pass" placeholder="CONFIRM PASSWORD" required> <!-- FOR PASSWORD -->
                            </div>
                            
                            
                            <div class="form-group">
                                <label> 
                                    <input type="submit" class="form-control button" id="regis" name="regis" value="REGISTER"> <!-- FOR LOGIN BTN -->
                                  </label>
                            </div>
                            
                          </form>
                    </div>
                </div>
            </div>
          </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
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
                        swal.fire(data.title,data.message,data.icon)

                        setTimeout(() => {
                          window.location.href = "regis.php"
                        },2000);
                        
                      }else{
                        swal.fire(data.title,data.message,data.icon)
                        setTimeout(() => {
                          window.location.href = "index.php"
                          console.log(data);
                        },2000);

                      }
                    });


                    
                  }else{
                    Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'PLEASE INPUT CREDENTIALS',
                            showConfirmButton: false
                            })
                        setTimeout(() => {
                          window.location.href = "regis.php"
                          console.log(data);
                        },2000);
                  }

              });
              
           
              
            });
          </script>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="js/bootsrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    
</body>
</html>