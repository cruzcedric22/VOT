<?php include('admin.php') ;
      include('config.php');
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <style>
        .dataTables_filter{
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row p-2">
                    <h2>Staff</h2>
            <div class="p-3 bg-white shadow-sm w-100 rounded">
                        <div class="row">
                            <div class="col">
                                <div class="row mb-2">
                                    <div class="col">
                                    
                                    </div>
                                    <div class="col-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add_staff">
                                        ADD STAFF
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="add_staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- add staff -->
                                            <form action="add_staff.php" method="post">
                                            <div class="modal-body">  
                                            <div class="mb-3">
                                                <label for="" class="form-label">Student Number</label>
                                                <input type="text" class="form-control" name="addsff_stdno" required>
                                            </div> 
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="addsff_name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Middle Initial:</label>
                                                <input type="text" class="form-control" name="addsff_mname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="addsff_lname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Course</label>
                                                <?php $query = "SELECT * FROM vot_course";
                                                $exe = mysqli_query($conn,$query); ?>  
                                                <select class="form-select" name="addsff_course" aria-label="Default select example">  
                                                <?php while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                                    <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="addsff_email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="addsff_username" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="addsff_pass" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Confirm Password:</label>
                                                <input type="password" class="form-control" name="addsff_pass_con" required>
                                            </div>
                                          
                                         
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="btn_addsff" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                       
                                        
              
                <div class="row mb-2">
                    <div class="col">
                    <h3>Year:</h3>
                    <select class="form-select w-25" id="year_staff">
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
               </div>
                     <div class="card-body">
                   <?php

                        $populatetb = "SELECT vot_users.username, vot_users.password, vot_user_profile.fname, vot_user_profile.m_initial, vot_course.course_id, vot_user_profile.lname, vot_course.course_name, vot_user_profile.email, vot_user_profile.student_no, vot_year.year FROM vot_users, vot_user_profile, vot_course, vot_year WHERE (vot_users.category_id = 2) AND (vot_users.student_no = vot_user_profile.student_no) AND (vot_course.course_id = vot_user_profile.course_id) AND vot_year.id = vot_user_profile.year_id";
                        $result = $conn ->query($populatetb);
                     if(mysqli_num_rows($result)>0){	
                    ?>
                      <div class="table-responsive-lg">
                        <table class="table table-bordered table-sm table-dark" id="table_staff" style="width:100%" >
                          <thead>
                            <tr align = "center">
                            <th>Name</th>
                            <th>Username</th>
                            <th>Student_no</th>
                            <th>Course</th>
                            <th>Year</th>
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
                            <td>
                                <button type="button" class="btn btn-warning bi bi-pen-fill" data-bs-toggle="modal" data-bs-target="<?php echo '#edit_btn'.$row['student_no'] ?>"></button>
                                <div class="modal fade" id="<?php echo 'edit_btn'.$row['student_no'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_btnLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-dialog-centered">
                                            <div class="modal-content overflow-auto">
                                                    
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-black" id="edit_btnLabel">Edit</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    
                                                        <div class="modal-body text-black">
                                                    <form action="edt_staff.php"  method="post">
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Name</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['fname'] ?>" name="edt_name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Middle Initial</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['m_initial'] ?>" name="edt_mname" >
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['lname'] ?>" name="edt_lname" >
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Username</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['username'] ?>" name="edt_username" required>
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Course</label>
                                                            <select class="form-select" name="edt_course" aria-label="Default select example">
                                                                <option selected value="<?php echo $row['course_id'] ?>"><?php echo str_replace(' ', '', $row['course_name']) ?></option>
                                                                <?php $query = "SELECT * FROM vot_course";
                                                                        $exe = mysqli_query($conn,$query);
                                                                        while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                                                <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name']; ?></option>
                                                                <?php } ?>                                                                                        </select>
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Email</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['email'] ?>" name="edt_email" required>
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="" class="form-label">Password</label>
                                                            <input type="password" class="form-control"  name="edt_pass">
                                                            </div>
                                                            <input type="text" value="<?php echo $row['student_no'] ?>" name="edt_id" hidden>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="edtstff_submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                        </div>
                                            </div>
                                                    
                                        </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="<?php echo "#del_btn".$row['student_no'].str_replace(' ', '', $row['fname']) ?>"></button>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo "del_btn".$row['student_no'].str_replace(' ', '', $row['fname']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-black" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="delete_staff.php" method="post"> <input type="text" name="delstff_id" value="<?php echo $row['student_no'] ?>" hidden>
                                                <h1 class="bi bi-exclamation-triangle-fill d-flex justify-content-center" style="color: red ;"></h1>
                                                <p class=" d-flex justify-content-center text-black">Are you sure you want to delete <?php echo $row['fname']?></p>    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit"  name="delstff_submit" class="btn btn-danger">Submit</button>
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
                                        </center>
                               

                                   

                                   
                               
                        
                       
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
   <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
   <script>
     $( document ).ready(function() {

        var table = $("#table_staff").DataTable();
        table.column( 4 ).visible( false );
          $('#year_staff').on('change', function () {

                 
            table.search( this.value ).draw();


            } );

    });
   </script>



</body>
</html>