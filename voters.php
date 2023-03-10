<?php session_start(); 
include('config.php');
$user_id = $_SESSION['id'];
$user_log = $_SESSION['username']; 
$user_cat = $_SESSION['cat_name'];
$fname = $_SESSION['fname'];
$mname = $_SESSION['m_initial'];
$lname = $_SESSION['lname'];
$course = $_SESSION['course_id'];

// echo $user_id;

if($user_cat == 'Admin' || $user_cat == 'Staff'){
    echo "<script> setTimeout(() => {
        window.location.href = 'admin.php'
    },1); </script>";
}

//note if ever query mo yung pag naka file na yung user para di siya nakaasa sa session

$queryFiled = "SELECT is_filing FROM vot_users WHERE id = '$user_id'";
$res = $conn -> query($queryFiled);
while($row6 = mysqli_fetch_assoc($res)){
    $filed  =  $row6['is_filing'];
}
// echo $filed;



$user_isvoted = $_SESSION['isvoted'];
$session_elect = "SELECT * FROM vot_session";
$exe2 = $conn ->query($session_elect);
    while($row = mysqli_fetch_assoc($exe2)){
        $_SESSION['is_election'] = $row['is_election'];
    }
$elect_session = $_SESSION['is_election'];
$session_elect1 = "SELECT * FROM vot_session";
$exe3 = $conn ->query($session_elect1);
    while($row = mysqli_fetch_assoc($exe3)){
        $_SESSION['is_filing'] = $row['is_filing'];
    }
    $session_filing = $_SESSION['is_filing'];
      
 
// echo $filed;
// echo  $session_filing;
// echo $course;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voters</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="favicon.ico">
    <style>

      
    </style>
    
</head>

<?php






if($user_log == ""){
   
    // header('Location: index.php');
  echo "<script> setTimeout(() => {
            window.location.href = 'index.php'
        },1); </script>";

}






// drop down position population

$droppos = "SELECT * FROM vot_position";
$result = mysqli_query($conn,$droppos);

//drop course
$dropcourse = "SELECT * FROM vot_course";
$result2 = mysqli_query($conn,$dropcourse);

// drop down party-list 

$droppar = "SELECT * FROM vot_party_list";
$result1 = mysqli_query($conn,$droppar);
    

?>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
        <div class="navbar-brand">
      <center><img src="img/img_ucc.png" alt="Logo" width="80" height="80" class="d-inline-block"><p class="primary-text fw-bold h5">Voters</p></img></center>
         </div>
            <div class="list-group list-group-flush my-3">
                <?php 
                if($user_isvoted == 0 && $elect_session == 1){ ?> 
                <a href="voting.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="bi bi bi-pen-fill me-2"></i>Voting</a>
                    
                <?php }elseif($user_isvoted == 1 && ($elect_session == 1 || $elect_session == 0)){ ?>
                    <a href="voting.php" style="pointer-events: none; cursor: default; text-decoration: none; 
                        color: green;" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="bi bi bi-pen-fill me-2" ></i>VOTED</a>
                    <?php } elseif($elect_session == 0){ ?>
                        <a href="voting.php" style="pointer-events: none; cursor: default; text-decoration: none; 
                        color: red;" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="bi bi bi-pen-fill me-2" ></i>Election has not yet started</a>
                
                   <?php } ?>
                <a href="vot_veri.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="bi bi-check-all me-2"></i>Vote Verification</a>
                <?php if($session_filing == 1 && $filed == 0){ ?>
                <button type="button" class="btn bi bi-people-fill list-group-item list-group-item-action bg-transparent second-text fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Filing
                </button>
                <?php }else{ ?>
                    <button type="button" class="btn bi bi-people-fill list-group-item list-group-item-action bg-transparent second-text fw-bold" style="pointer-events: none; cursor: default; text-decoration: none; 
                        color: red;"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Filing
                    </button>
               <?php } ?>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content overflow-auto">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Filing</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="processs_filing.php" enctype="multipart/form-data">
                            <div class="modal-body">
                            <div class="mb-3">
                                <!-- <label for="exampleFormControlInput1" class="form-label">Name</label> -->
                                <input type="text" class="form-control" name="can_name" id="exampleFormControlInput1" value="<?php echo $fname ?>" hidden>
                                </div>
                                <div class="mb-3">
                                <!-- <label for="exampleFormControlInput1" class="form-label">Middle Initial</label> -->
                                <input type="text" class="form-control" name="can_mname" id="exampleFormControlInput1" value="<?php echo $mname ?>" hidden>
                                </div>
                                <div class="mb-3">
                                <!-- <label for="exampleFormControlInput1" class="form-label">Last Name</label> -->
                                <input type="text" class="form-control" name="can_lname" id="exampleFormControlInput1" value="<?php echo $lname ?>" hidden>
                                </div>
                                <div class="mb-3">
                                <!-- <label for="exampleFormControlInput1" class="form-label">Course</label> -->
                                <input type="text" name="can_course" value="<?php echo $course ?>" hidden>
                               
                                <!-- <select class="form-select" name="can_course" aria-label="Default select example"> -->
                                    <?php // if(mysqli_num_rows($result2) > 0 ){

                                               // foreach($result2 as $row1){
                                                    ?>
                                                        <!-- <option value="<?php //echo $row1['course_id'];?>"><?php //echo $row1['course_name'];?></option> -->
                                                    <?php
                                              //  }
                                              //  }?>
                                    <!-- </select> -->
                                
                                </div>
                                <div class="mb-3 row">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Position:</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <select class="form-select" name="droppos" aria-label="Default select example">
                                        <?php if(mysqli_num_rows($result) > 0 ){

                                            foreach($result as $row){
                                                ?>
                                                    <option value="<?php echo $row['position_id'];?>"><?php echo $row['pos_name'];?></option>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <option value="">No record found</option>
                                            <?php
                                        } ?>
                                            
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Party-List:</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        
                                    <select class="form-select" name="droppartylist" aria-label="Default select example">
                                    <?php if(mysqli_num_rows($result) > 0 ){

                                                foreach($result1 as $row1){
                                                    ?>
                                                        <option value="<?php echo $row1['partylist_id'];?>"><?php echo $row1['party_name'];?></option>
                                                    <?php
                                                }
                                                }?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Photo</label>
                                <input type="file" class="form-control btn btn-outline-warning" name="can_photo" accept=".jpg, .jpeg, .png" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                             
                                

                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                    </div>
                    </form>
                </div>
                </div>
               
                <a href="voters_setting.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                                <li><a class="dropdown-item" href="profile_vt.php">Profile</a></li>
                                <li><a class="dropdown-item" href="voters_setting.php">Settings</a></li>
                                <li><a href="logout.php" class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

       

        

               

            <!-- </div>
        </div>
    </div> -->
    <!-- /#page-content-wrapper -->
    <!-- </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    


    
  <script src="js/bundle1.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="js/bootsrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>


  <script>
    
   

function onFormSubmit() {
    // your Javascript code here
     
   event.preventDefault();
}


  </script>

  
</body>
</html>