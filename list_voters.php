<?php include('admin.php') ;
      include('config.php');
     
      
     


      //drop course
        $dropcourse = "SELECT * FROM vot_course";
        $result2 = mysqli_query($conn,$dropcourse);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST OF VOTERS</title>
    <style>
    .dataTables_filter{
        margin-bottom: 8px;
    }
   </style>
</head>
<body>
<div class="container">
        <div class="row p-2">
                    <h2>LIST OF VOTERS</h2>
            <div class="p-3 bg-white shadow-sm w-100 rounded">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addVoter">
                Add a voter
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addVoter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Voter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="registerForm" class="main-form text-center" method="post">
                            <div class="form-group">
                                <label class="form-label">Student Number:</label>
                                    <input type="text" class="form-control" id="stdno" name="stdno" placeholder="STUDENT NO:" required> <!-- FOR STUDENT NO/ -->
                            </div>
                            <div class="form-group">
                                <label class="form-label">Given Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="NAME" required> <!-- FOR NAME -->
                            </div>
                            <div class="form-group">
                                <label class="form-label">Middle Initial:</label>
                                    <input type="text" class="form-control" id="miniital" name="m_initial" placeholder="MIDDLE INITIAL" required> <!-- FOR MIDDLE INITIAL -->
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="LAST NAME" required> <!-- FOR MIDDLE INITIAL -->
                            </div>
                            <div class="form-group">
                                <label class="form-label">Course:</label>
                                <select class="form-select" name="course" aria-label="Default select example">
                                    
                                       <?php foreach($result2 as $row1){
                                            ?>
                                                <option value="<?php echo $row1['course_id'];?>"><?php echo $row1['course_name'];?></option>
                                            <?php
                                        } ?>
                                      
                                        </select> <!-- FOR COURSE -->
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required> <!-- FOR EMAIL -->
                            </div>
                            <div class="form-group">
                                <!-- <label class="form-label">Username:</label> -->
                                    <input type="text" class="form-control" id="username" name="username" placeholder="USERNAME" hidden> <!-- FOR USERNAME -->
                            </div>
                            <div class="form-group">
                                <!-- <label class="form-label">Password:</label> -->
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="PASSWORD" hidden> <!-- FOR PASSWORD -->
                            </div>
                            <div class="form-group">
                                <!-- <label class="form-label">Confirm password:</label> -->
                                    <input type="password" class="form-control" id="pass1" name="con_pass" placeholder="CONFIRM PASSWORD" hidden> <!-- FOR PASSWORD -->
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="regis" onclick="copyTextValue()" class="btn btn-primary">Register</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addcourse">
                Add Course
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addcourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <h5>List of Position:</h5>
                        <?php $select2 = "SELECT * FROM vot_course";
                            $result2 = mysqli_query($conn,$select2); ?>
                        <div class="row">
                           <?php while($row2 = mysqli_fetch_assoc($result2)){ 
                                ?>
                                <div class="col-6">
                                <p class="m-0 mb-2"><?php echo $row2['course_name'] ?></p>
                                </div>
                                <?php } ?>
                                <?php ?>
                        </div>
                            <h5>Add a Course:</h5>
                            <form action="add_course.php" method="POST">
                            <div class="mb-3">
                            <input type="text" class="form-control" value="" name="add_course" >
                            </div>
                            <?php $select3 = "SELECT * FROM vot_course";
                            $exe2 = mysqli_query($conn,$select3);
                            ?>
                            <h5>Delete Course:</h5>
                            <select class="form-select" aria-label="Default select example" name="pos_course">
                                <?php while($row3 = mysqli_fetch_assoc($exe2)){ ?>
                            <option value="<?php echo $row3['id']?>"><?php echo $row3['course_name']?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit_course">Submit</button>
                        <button type="submit" name="delete_course" class="btn btn-danger">Delete</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                        <div class="row">
                            <div class="col">
                            <div class="col-md-12">
            
                                    <h3>Year:</h3>
            <div class="col mb-2">
                <select class="form-select w-25" name="SY" id="year_voters" >
                       <option value="">Select All</option>
                       <?php
                           $query = "SELECT year FROM vot_year";
                           $exe6 = $conn -> query($query);
                           while($row6 = mysqli_fetch_assoc($exe6)){
                          ?>
                            <option><?php echo $row6['year'] ?></option>  
                         <?php } ?>
                </select>
            </div>
          </div>
                                        <center>
          
                     
                   <?php
                      $populatetb = "SELECT vot_users.username, vot_users.password, vot_user_profile.date_created, vot_user_profile.course_id, vot_user_profile.status, vot_user_profile.fname, vot_user_profile.m_initial, vot_user_profile.lname, vot_course.course_name, vot_user_profile.email, vot_user_profile.student_no, vot_year.year FROM vot_users, vot_user_profile, vot_course, vot_year WHERE (vot_users.category_id = 1) AND (vot_users.student_no = vot_user_profile.student_no) AND (vot_course.course_id = vot_user_profile.course_id) AND vot_year.id = vot_user_profile.year_id";
                      $result = $conn ->query($populatetb);  

             
                     if(mysqli_num_rows($result)>0){
                    ?>
                      <div class="table-responsive-lg">
                        <table class="table table-bordered table-sm table-dark" id="table_voter" style="width:100%" >
                          <thead>
                            <tr align = "center">
                            <th>Name</th>
                            <th>Username</th>
                            <th>Student_no</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php while($row = mysqli_fetch_array($result)){?>
                                                        <td><?php echo $row['fname']; ?></td>
                                                        <td><?php echo $row['username']; ?></td>
                                                        <td><?php echo $row['student_no']; ?></td>
                                                        <td><?php echo $row['course_name']; ?></td>
                                                        <td><?php echo $row['year']; ?></td>
                                                        <td class="text-center">
                                                        <?php if($row['status'] == 1){ ?>
                                                                <h5 style="color: #20c997;">Active</h5>    
                                                           <?php }elseif($row ['status'] == 0){ ?>
                                                            <h5 style="color: red;">Not Verified</h5>
                                                          <?php }elseif($row['status'] == 2){ ?>
                                                            <h5 style="color: red;">Inactive</h5>
                                                            <?php } ?>
                                                        
                                                        </td>
                                                        <td class="text-center">
                                                        <?php echo date('F d, Y , g:i A',strtotime(str_replace(',',',', $row['date_created']))) ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning bi bi-pen-fill" data-bs-toggle="modal" data-bs-target="<?php echo '#edit_btn'.$row['student_no'].str_replace(' ', '',$row['fname']).$row['username'].$row['course_name'].$row['password'] ?>">Edit</button>
                                                            <div class="modal fade" id="<?php echo 'edit_btn'.$row['student_no'].str_replace(' ', '',$row['fname']).$row['username'].$row['course_name'].$row['password'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_btnLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-dialog-centered">
                                                                        <div class="modal-content overflow-auto">
                                                                                
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title text-black" id="edit_btnLabel">Edit</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                
                                                                                    <div class="modal-body text-black">
                                                                                <form action="edt_voter.php"  method="post">
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Name</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $row['fname'] ?>" name="edt_name" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Middle Initial</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $row['m_initial'] ?>" name="edt_mname" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Last Name</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $row['lname'] ?>" name="edt_lname" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Username</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $row['username'] ?>" name="edt_username" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Course</label>
                                                                                        <select class="form-select" aria-label="Default select example"  name="edt_course">
                                                                                            <option selected value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name'] ?></option>
                                                                                            <?php $query = "SELECT * FROM vot_course";
                                                                                                $exe = mysqli_query($conn,$query);
                                                                                                while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                                                                            <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Email</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $row['email'] ?>" name="edt_email" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Password</label>
                                                                                        <input type="password" class="form-control" value="" name="edt_pass" >
                                                                                        </div>
                                                                                        <input type="text" value="<?php echo $row['student_no'] ?>" name="edt_id" hidden>
                                                                                        
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" name="edtvoter_submit" class="btn btn-primary">Submit</button>
                                                                                </form>
                                                                                    </div>
                                                                        </div>
                                                                                
                                                                    </div>
                                                            </div>
                                                            <!-- Button trigger modal -->
                                                            <?php if($row['status'] == 0) { ?>
                                                                <button type="button" class="btn btn-success bi bi-check" data-bs-toggle="modal" data-bs-target="<?php echo "#del_btn".$row['student_no'].str_replace(' ', '', $row['fname']) ?>">Verify</button>
                                                           <?php  } ?>
                                                           <?php if($row['status'] == 1){ ?>
                                                            <button type="button" class="btn btn-danger bi bi-exclamation-lg" data-bs-toggle="modal" data-bs-target="<?php echo "#del_btn".$row['student_no'].str_replace(' ', '', $row['fname']) ?>">Inactive</button>
                                                            <?php } ?>
                                                            <?php if($row['status'] == 2){ ?>
                                                            <button type="button" class="btn btn-success bi bi-check-all" data-bs-toggle="modal" data-bs-target="<?php echo "#del_btn".$row['student_no'].str_replace(' ', '', $row['fname']) ?>">Active</button>
                                                            <?php } ?>
                                                         

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="<?php echo "del_btn".$row['student_no'].str_replace(' ', '', $row['fname']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <?php if($row['status'] == 0){ ?>
                                                                    <h5 class="modal-title text-black" id="exampleModalLabel">Verify</h5>
                                                                    <?php } ?>
                                                                    <?php if($row['status'] == 1){ ?>
                                                                    <h5 class="modal-title text-black" id="exampleModalLabel">Inactive</h5>
                                                                    <?php } ?>
                                                                    <?php if($row['status'] == 2){ ?>
                                                                    <h5 class="modal-title text-black" id="exampleModalLabel">Active</h5>
                                                                    <?php } ?>

                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="delete_voter.php" method="post"> <input type="text" name="delstff_id" value="<?php echo $row['student_no'] ?>" hidden>
                                                                            <?php if($row['status'] == 0) { ?>
                                                                            <h1 class="bi bi-check d-flex justify-content-center" style="color: green ;"></h1>
                                                                            <p class=" d-flex justify-content-center text-black">Are you sure you want to verify user <?php echo $row['fname']?>? </p>    
                                                                            <?php } ?>
                                                                            <?php if($row['status'] == 1) { ?>
                                                                            <h1 class="bi bi-exclamation-lg d-flex justify-content-center" style="color: red ;"></h1>
                                                                            <p class=" d-flex justify-content-center text-black">Are you sure you want set the user <?php echo $row['fname']?> inactive? </p>    
                                                                            <?php } ?>
                                                                            <?php if($row['status'] == 2) { ?>
                                                                            <h1 class="bi bi-check-all d-flex justify-content-center" style="color: green ;"></h1>
                                                                            <p class=" d-flex justify-content-center text-black">Are you sure you want set the user <?php echo $row['fname']?> active? </p>    
                                                                            <?php } ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <?php if($row['status'] == 0){ ?>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"  name="delvoter_submit" class="btn btn-success">Submit</button>
                                                                   <?php } ?>
                                                                   <?php if($row['status'] == 1){ ?>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"  name="delvoter_inactive" class="btn btn-danger">Submit</button>
                                                                   <?php } ?>
                                                                   <?php if($row['status'] == 2){ ?>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"  name="delvoter_active" class="btn btn-success">Submit</button>
                                                                   <?php } ?>
                                                                </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } } ?>
                          </tbody>
                        </table>
                      </div>             




                            </div>
                                            
                                        </center>
                               

                                   

                                   
                      
                       
            
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
   <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $( document ).ready(function() {

          var table = $('#table_voter').DataTable();
          table.column( 4 ).visible( false );
          $('#year_voters').on('change', function () {

                 
            table.search( this.value ).draw();


            } );
    });
            $(function(){
              $('#regis').click(function(e){

                let usercopy = document.getElementById('stdno').value;
                document.getElementById('username').value = usercopy;
                document.getElementById('pass').value = usercopy;
                document.getElementById('pass1').value = usercopy;



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
                          window.location.href = "list_voters.php"
                        },2000);
                        
                      }else{
                        swal.fire(data.title,data.message,data.icon)
                        setTimeout(() => {
                          window.location.href = "list_voters.php"
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
                          window.location.href = "list_voters.php"
                          console.log(data);
                        },2000);
                  }

              });
              
           
              
            });
          </script>




</body>
</html>