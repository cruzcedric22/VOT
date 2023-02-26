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
                       
                          </tbody>
                        </table>
                      </div>             




                            </div>
                                            
                                        </center>
        </div>
    </div>

                                                                        <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <div class="mb-3">
                                                                            <!-- <form method="post"> -->
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Name</label>
                                                                                        <input type="text" class="form-control" value="" name="edt_name" id="edt_name" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Middle Initial</label>
                                                                                        <input type="text" class="form-control" value="" name="edt_mname" id="edt_mname" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Last Name</label>
                                                                                        <input type="text" class="form-control" value="" name="edt_lname" id="edt_lname" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Username</label>
                                                                                        <input type="text" class="form-control" value="" name="edt_username" id="edt_username" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Course</label>
                                                                                        <select class="form-select" aria-label="Default select example"  name="edt_course" id="edt_course">
                                                                                            <option selected id="op1" value=""></option>
                                                                                            <?php $query = "SELECT * FROM vot_course";
                                                                                                $exe = mysqli_query($conn,$query);
                                                                                                while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                                                                            <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Email</label>
                                                                                        <input type="text" class="form-control" value="" name="edt_email" id="edt_email" required>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Password</label>
                                                                                        <input type="password" class="form-control" value="" name="edt_pass" id="edt_pass" >
                                                                                        </div>
                                                                                        <input type="text" value="" name="edt_id" hidden>
                                                                                        
                                                                                    </div>
                                                                           
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary"  onclick="editVoter()" data-bs-dismiss="modal">Update</button>
                                                                                <input type="hidden" id="hiddendata">
                                                                                </div>
                                                                            </div>
                                  
                                                            

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
   <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $( document ).ready(function() {

        $('#table_voter').DataTable({
            'serverside':true,
            'processing':true,
            'paging':true,
            "columnDefs": [
                {
                    "classmate": "dt-center", "targets": "_all"
                },],
        
        'ajax':{
            'url':'table_voter.php',
            'type':'post',
         },
         'fnCreateRow':function(nRow,aData,iDataIndex){
            $(nRow).attr('id',aData[0]);
         }
         
         });

     

          var table = $('#table_voter').DataTable();
          table.column( 4 ).visible( false );
          $('#year_voters').on('change', function () {

                 
            table.search( this.value ).draw();


            });
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
                      var data = JSON.parse(response);
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

function up(fname,mname,lname,username,course,courseid,email,studentno){
        // alert(fname+mname+lname+username+course+courseid+email);
        // alert(courseid);

        $('#edt_name').val(fname);
        $('#edt_mname').val(mname);
        $('#edt_lname').val(lname);
        $('#edt_username').val(username);
        $('#hiddendata').val(studentno);
        $('#op1').text(course);
        $('#op1').val(courseid);
        $('#edt_email').val(email);
        // $( "#edt_course" ).change(function() {
        //     var conceptName = $('#edt_course').find(":selected").val();
        //     alert(conceptName);
        //     });
        // $('#op1').val(courseid);

        
        $('#edit_modal').modal("show");

    };
    
    function editVoter(){
        var id = $('#hiddendata').val();
        var name = $('#edt_name').val();
        var mname = $('#edt_mname').val();
        var lname = $('#edt_lname').val();
        var username = $('#edt_username').val();
        var course = $('#edt_course').val();
        var email = $('#edt_email').val();
        var pass = $('#edt_pass').val();

       
        


        $.post("edt_voter.php", {
      edt_id:id, edt_name:name, edt_mname:mname, edt_lname:lname, edt_username:username, edt_course:course, edt_email:email, edt_pass:pass
      },function(data,status){

        // var jsons = JSON.parse(data);
      //  status = jsons.status;
        // console.log(status)
        if(status =='success'){
          $("#edit_modal").modal('hide');
         $('#table_voter').DataTable().ajax.reload();
        }

      });
    };
  
          </script>




</body>
</html>