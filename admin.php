<?php 
 session_start();

 $user_log = $_SESSION['username']; 
 $user_cat = $_SESSION['cat_name'];


 if($user_log == ""){
    

    echo "<script> setTimeout(() => {
             window.location.href = 'index.php'
         },1); </script>";

 }
 if($user_cat == 'Voter'){
     echo "<script> setTimeout(() => {
        window.location.href = 'voters.php'
    },1); </script>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="favicon.ico">
    
</head>
<body>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white"  id="sidebar-wrapper">
        <div class="navbar-brand">
      <center><img src="img/img_ucc.png" alt="Logo" width="80" height="80" class="d-inline-block"><p class="primary-text fw-bold h5"><?php echo $user_cat ?></p></img></center>
         </div>
            <div class="list-group list-group-flush my-3">
                <a href="results.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="bi bi-envelope-paper-fill me-2"></i>Votes</a>
                 <a href="elect_year.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-calendar-fill me-2"></i>Election Year</a> 
                <a href="candidates.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-award-fill me-2"></i>Candidates</a>
                <a href="list_voters.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-people-fill me-2"></i>Voters</a>
                <a href="logs.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-clipboard-fill me-2"></i>Logs</a>
                        <?php if($user_cat == 'Admin'){ ?>
                <a href="staff.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-person-circle me-2"></i>Staff</a>
                        <?php } ?>
                <a href="admin_setting.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-gear-fill me-2"></i>Settings</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                  
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"><?php echo  $_SESSION['username']; ?></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if($user_cat == 'Staff'){ ?>
                                <li><a class="dropdown-item" href="profile_ad.php">Profile</a></li>
                                <?php } ?>
                                <li><a class="dropdown-item" href="admin_setting.php">Settings</a></li>
                                <li><a href="logout.php" class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- <div class="container-fluid px-4"> -->
                
                        <!-- <div class="p-3 bg-white shadow-sm d-flex  rounded"> -->
                            <!-- <div> -->
                                <!-- <h3 class="fs-2">720</h3> -->
                                <!-- <p class="fs-5">Products</p> -->
                            <!-- </div> -->
                            
                        <!-- </div> -->
                
            <!-- </div> -->

               

            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- /#page-content-wrapper -->
    <!-- </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    


    
  <script src="js/bundle1.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="js/bootsrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
  
</body>
</html>