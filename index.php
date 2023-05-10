<?php
session_start();
include('config.php');


if(isset($_SESSION['username'])  && isset($_SESSION['cat_name'])){
$user_log = $_SESSION['username']; 
$user_cat = $_SESSION['cat_name'];


 if($user_log != "" && $user_cat == 'Voter'){
    

    echo "<script> setTimeout(() => {
             window.location.href = 'voters.php'
         },1); </script>";

 }
 
 if($user_log != "" && $user_cat == 'Staff'){
    

  echo "<script> setTimeout(() => {
           window.location.href = 'admin.php'
       },1); </script>";

}

if($user_log != "" && $user_cat == 'Admin'){
    

  echo "<script> setTimeout(() => {
           window.location.href = 'admin.php'
       },1); </script>";

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" /> -->
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
  <link rel="icon" href="favicon.ico">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

  <style>
    a{
      text-decoration: none;
    }
   
  </style>
</head>
<div>
<?php


?>
</div>
<body>

<center>
        <div class="container login">
            <div class="card container login-container bg-light shadow">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- column left -->
                        <div class="col-sm-6 column-left">
                            <img src="img/img_ucc.png" alt="">
                            <div>
                                <label for="" class="ucc-name">UNIVERSITY OF CALOOCAN CITY</label> <br>
                                <label for="" class="address">Biglang Awa St Cor 11th Ave Catleya, East Grace Park, Caloocan, 1400 Metro Manila</label>
                            </div>
                        </div>
                        <!-- column right -->
                        <div class="col-sm-6 column-right">
                        <form id="login_form" method="post">
                            <label for="" class="login-text">Login</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg" id="pass" name="pass" placeholder="Password">
                            </div>
                            <div class="input-group">
                                <button type="button" class="btn btn-lg w-100 shadow-sm" id="login" name="login" value="LOGIN">Login</button>
                            </div>
                          </form>
                            <a href="forget_pass.php" class="forgot-password">Forgot Password?</a> <br>
                            <label for="" class="account">Don't have an account yet? <a href="regis.php" class="register-link">Register here.</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
       
        
      
    

 <!-- Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src = "js/jquery-3.6.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="js/bootsrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
              $(function(){
              $('#login').click(function(e){

                  var valid = this.form.checkValidity();
                  if(valid){
                  
                  var params = $('#login_form').serialize();
                    e.preventDefault();
                    $.post('process_log.php',params).then(response=>{
                      var data = JSON.parse(response)
                      console.log(data);
                      
                      if(data.login == 1){
                        swal.fire(data.title,data.message,data.icon)

                        setTimeout(() => {
                         window.location.href = "voters.php"
                        },2000);
                        
                      }else if(data.login == 2){
                        swal.fire(data.title,data.message,data.icon)

                        setTimeout(() => {
                          window.location.href = "admin.php"
                        },2000);

                      }else if(data.login == 3){
                        swal.fire(data.title,data.message,data.icon)

                        setTimeout(() => {
                          window.location.href = "admin.php"
                        },2000);
                      }else if (data.login == 4){
                        swal.fire(data.title,data.message,data.icon)
                        // setTimeout(() => {
                        //   window.location.href = "index.php"
                        //   console.log(data);
                        // },2000);
                        $('#username').val("");
                        $('#pass').val("");

                      }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'PLEASE INPUT CREDENTIALS',
                            showConfirmButton: false
                            })
                        setTimeout(() => {
                          window.location.href = "index.php"
                          console.log(data);
                        },2000);
                      }
                    })
          

                    
                  }

              });
              
           
              
            });
          </script>

   
  <!-- <script>
    $(function(){
      $('#login').click(function(e){
        
          var valid = $this.form.checkValidity();
          // console.log(valid);
          // if(valid){
            if(valid){
              var username = $('#username').val();
              var password = $('#pass').val();
            }
            e.preventDefault();
              $.ajax({
              type:'POST',
              url : 'process_log.php',
              data : {username:username, pass:password},
              success : function(data){
                alert(data);
                if($.trim(data) === '1'){
                  setTimeout('window.location.href = "voters.php"', 2000);

                }
              },
              error: function(data){
                alert('error');
              }

          });

          // }
          // e.preventDefault();

      
      });
    });
  </script> -->

</body>
</html>