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
                         <!-- <h5>List of Position:</h5>
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
                        </div> -->
                            <h5>Add a Course:</h5>
                            <form method="POST">
                            <div class="mb-3">
                            <input type="text" class="form-control" value="" name="add_course" id="add_course" >
                            </div>
                            <?php $select3 = "SELECT * FROM vot_course";
                            $exe2 = mysqli_query($conn,$select3);
                            ?>
                            <h5>Delete Course:</h5>
                            <select class="form-select" aria-label="Default select example" name="pos_course" id="pos_course">
                            <option value="" >Courses</option>
                                <?php while($row3 = mysqli_fetch_assoc($exe2)){ ?>
                            <option value="<?php echo $row3['id']?>"><?php echo $row3['course_name']?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addcourse()" name="submit_course" id="submit_course">Submit</button>
                        <button type="button" name="delete_course" onclick="deletecourse()" class="btn btn-danger">Delete</button>
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

                             <!-- modal for user verify -->
                             <div class="modal fade" id="verifyUpdateModal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update User Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="bi bi-check d-flex justify-content-center" style="color: green;"></h2>
                                         <p class="text-center p-0 m-0"> Are you sure you want to verify <span id="statname"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="verifystatus()" class="btn btn-success">Verify</button>
                                        <input type="hidden" id="idveri">
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- modal for inactive -->
                                <div class="modal fade" id="inactiveUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update User Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <h2 class="bi bi-exclamation-lg d-flex justify-content-center" style="color: red;"></h2>
                                         <p class="text-center p-0 m-0"> Are you sure you want to inactive <span id="statname1"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="inactivestatus()" class="btn btn-danger">Inactive</button>
                                        <input type="hidden" id="idveri1">
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- modal for active -->
                                <div class="modal fade" id="activeUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update User Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <h2 class="bi bi-check-all d-flex justify-content-center" style="color: green;"></h2>
                                         <p class="text-center p-0 m-0"> Are you sure you want to active <span id="statname2"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="activestatus()" class="btn btn-success">Active</button>
                                        <input type="hidden" id="idveri2">
                                    </div>
                                    </div>
                                </div>
                                </div>


                                
                                        <!-- modal for edit details -->
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
        // alert(fname)

        $('#edt_name').val(fname.replaceAll('_',' '));
        $('#edt_mname').val(mname.replaceAll('_',' '));
        $('#edt_lname').val(lname.replaceAll('_',' '));
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

    function verify(name,id){
        // alert(id)
        $('#verifyUpdateModal').modal("show");
        $('#statname').html(name.replaceAll('_',' '));
        $('#idveri').val(id);
    }

    function verifystatus(){
       var idveri = $('#idveri').val();
        $.post("delete_voter.php",{idveri:idveri
        },function(data,status){
            var data = JSON.parse(data);
            $('#verifyUpdateModal').modal("hide");
            swal.fire(data.title,data.message,data.icon);
            $('#table_voter').DataTable().ajax.reload();
        });

    }

    function inactive(name1,id1){
        // alert(name1,id1)
        $('#inactiveUpdateModal').modal("show");
        $('#statname1').html(name1.replaceAll('_',' '));
         $('#idveri1').val(id1);

    }

    function inactivestatus(){

       var idinactive = $('#idveri1').val();

        $.post("delete_voter.php",{idinactive:idinactive},function(data,status){
            var data = JSON.parse(data);
            $('#inactiveUpdateModal').modal("hide");
        swal.fire(data.title,data.message,data.icon);
        $('#table_voter').DataTable().ajax.reload();
        
       });

    }

    function active(name2,id2){
        $('#activeUpdateModal').modal("show");
        $('#statname2').html(name2.replaceAll('_',' '));
        $('#idveri2').val(id2);
    }

    function activestatus(){
        var idactive = $('#idveri2').val();
        $.post("delete_voter.php",{idactive:idactive},function(data,status){
            var data = JSON.parse(data);
            $('#activeUpdateModal').modal("hide");
            swal.fire(data.title,data.message,data.icon);
        $('#table_voter').DataTable().ajax.reload();
       
       });
    }
    
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

        var data = JSON.parse(data);

        // var jsons = JSON.parse(data);
      //  status = jsons.status;
        // console.log(status)
        if(status =='success'){
        $("#edit_modal").modal('hide');
        swal.fire(data.title,data.message,data.icon);
         $('#table_voter').DataTable().ajax.reload();
        }

      });
    };

    function addcourse(){
        var coursename = $('#add_course').val();
        if(coursename == ""){
            Swal.fire(
            'INPUT COURSE NAME',
            '',
            'warning'
                )
        }
        // alert(coursename);
        $.post("add_course.php",{add_course:coursename
        },function(data,status){
            var data = JSON.parse(data);
            if(status == 'success'){
                $("#addcourse").modal('hide');
              swal.fire(data.title,data.message,data.icon);
                reloadDropdown();
                $('#add_course').val("");
            }

        });

    };

    function deletecourse(){
        var delcourse = $('#pos_course').val();
        // alert(delcourse);
        $.post("add_course.php", {
         pos_course:delcourse,
      },function(data,status){
        var data = JSON.parse(data);
        if(status =='success'){
          // alert(data);
          $("#addcourse").modal('hide');
          reloadDropdown();
         $('#year_del').val("");
         swal.fire(data.title,data.message,data.icon);
       
        }

      });
    }

    function reloadDropdown(){
        $.ajax({
          type: "POST",
          url: "option_course.php",
         
          success: function(result) {
            // alert(result);
            // $("#year_del").reload();
            // $("#year_del").load("elect_year.php");
            $("#pos_course").html(result);


          },
          error: function(result) {
            alert('error');
          }
        });

    };
  
          </script>




</body>
</html>