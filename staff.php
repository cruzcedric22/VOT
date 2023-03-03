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
                                            <form method="post" id="regisstff">
                                            <div class="modal-body">  
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="addsff_name" id="addsff_name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Middle Initial:</label>
                                                <input type="text" class="form-control" name="addsff_mname" id="addsff_mname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="addsff_lname" id="addsff_lname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Course</label>
                                                <?php $query = "SELECT * FROM vot_course";
                                                $exe = mysqli_query($conn,$query); ?>  
                                                <select class="form-select" name="addsff_course" id="addsff_course" aria-label="Default select example">  
                                                <?php while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                                    <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="addsff_email" id="addsff_email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="addsff_username" id="addsff_username" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="addsff_pass" id="addsff_pass" required>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="" class="form-label">Confirm Password:</label>
                                                <input type="password" class="form-control" name="addsff_pass_con" required>
                                            </div>
                                           -->
                                         
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" name="btn_addsff" class="btn btn-primary" onclick="addStaff()">Save changes</button>
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

                        $populatetb = "SELECT vot_users.username, vot_users.password, vot_user_profile.fname, vot_user_profile.m_initial, vot_course.course_id, vot_user_profile.lname, vot_user_profile.status, vot_course.course_name, vot_user_profile.email, vot_user_profile.student_no, vot_year.year FROM vot_users, vot_user_profile, vot_course, vot_year WHERE (vot_users.category_id = 2) AND (vot_users.student_no = vot_user_profile.student_no) AND (vot_course.course_id = vot_user_profile.course_id) AND vot_year.id = vot_user_profile.year_id";
                        $result = $conn ->query($populatetb);
               
                    ?>
                      <div class="table-responsive-lg">
                        <table class="table table-bordered table-sm table-dark" id="table_staff" style="width:100%" >
                          <thead>
                            <tr align = "center">
                            <th>Name</th>
                            <th>Username</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                          </tbody>
                        </table>
                      </div>
                                        </center>
                               

                                   

                                   
                               
                        
                       
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
                                        <button type="button" onclick="inactiveStuffstatus()" class="btn btn-danger">Inactive</button>
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
                                        <button type="button" onclick="activeStuffstatus()" class="btn btn-success">Active</button>
                                        <input type="hidden" id="idveri2">
                                    </div>
                                    </div>
                                </div>
                                </div>


                            <!-- EDIT STUFF -->

                             <div class="modal fade" id="edit_btn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_btnLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-dialog-centered">
                                                <div class="modal-content overflow-auto">
                                                        
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-black" id="edit_btnLabel">Edit</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        
                                                            <div class="modal-body text-black">
                                                        <!-- <form action="edt_staff.php"  method="post"> -->
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Name</label>
                                                                <input type="text" class="form-control" value="" name="edt_name" id="edt_name" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Middle Initial</label>
                                                                <input type="text" class="form-control" value="" name="edt_mname" id="edt_mname" >
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" value="" name="edt_lname" id="edt_lname" >
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Username</label>
                                                                <input type="text" class="form-control" value="" name="edt_username" id="edt_username" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Course</label>
                                                                <select class="form-select" name="edt_course" id="edt_course" aria-label="Default select example">
                                                                    <option selected id="op1" value=""></option>
                                                                    <?php $query = "SELECT * FROM vot_course";
                                                                            $exe = mysqli_query($conn,$query);
                                                                            while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                                                    <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name']; ?></option>
                                                                    <?php } ?>                                                                                        
                                                                </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Email</label>
                                                                <input type="text" class="form-control" value="" name="edt_email" id="edt_email" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="" class="form-label">Password</label>
                                                                <input type="password" class="form-control"  name="edt_pass" id="edt_pass">
                                                                </div>
                                                                <input type="text" value="" name="edt_id" hidden>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" name="edtstff_submit" class="btn btn-primary" onclick="edtStaff()">Submit</button>
                                                                <input type="hidden" id="hiddendata">
                                                        <!-- </form> -->
                                                            </div>
                                                </div>
                                                        
                                            </div>
                                    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
   <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     $( document ).ready(function() {


        $('#table_staff').DataTable({
            'serverside':true,
            'processing':true,
            'paging':true,
            "columnDefs": [
                {
                    "classmate": "dt-center", "targets": "_all"
                },],
        
        'ajax':{
            'url':'table_staff.php',
            'type':'post',
         },
         'fnCreateRow':function(nRow,aData,iDataIndex){
            $(nRow).attr('id',aData[0]);
         }
         
         });

        var table = $("#table_staff").DataTable();
        table.column( 3 ).visible( false );
        // table.column( 4 ).visible( false );
          $('#year_staff').on('change', function () {

                 
            table.search( this.value ).draw();


            } );

    });

    function addStaff(){
        var stffname = $('#addsff_name').val();
        var stffmname = $('#addsff_mname').val();
        var stfflname = $('#addsff_lname').val();
        var stffcourse = $('#addsff_course').val();
        var stffemail = $('#addsff_email').val();
        var stffusername = $('#addsff_username').val();
        var stffpass = $('#addsff_pass').val();

        // alert(stfflname+stffmname+stfflname+stffcourse+stffemail+stffusername+stffpass)
        // var params = $('#regisstff').serialize();
        $.post("add_staff.php", {
        addsff_name:stffname, addsff_mname:stffmname, addsff_lname:stfflname, addsff_course:stffcourse,addsff_email:stffemail,addsff_username:stffusername, addsff_pass:stffpass
      },function(data,status){
        
        var data = JSON.parse(data);
        // alert(data);

        // var jsons = JSON.parse(data);
      //  status = jsons.status;
        // console.log(status)
        if(status =='success'){
        $("#add_staff").modal('hide');
        swal.fire(data.title,data.message,data.icon);
         $('#table_staff').DataTable().ajax.reload();
        }

      });


    };

    function editStaff(fname,mname,lname,username,course,courseid,email,studentno){
        $('#edit_btn').modal('show');
        $('#edt_name').val(fname.replaceAll('_',' '));
        $('#edt_mname').val(mname.replaceAll('_',' '));
        $('#edt_lname').val(lname.replaceAll('_',' '));
        $('#edt_username').val(username);
        $('#hiddendata').val(studentno);
        $('#op1').text(course);
        $('#op1').val(courseid);
        $('#edt_email').val(email);
    };

    function edtStaff(){
        var fname = $('#edt_name').val();
        var mname = $('#edt_mname').val();
        var lname = $('#edt_lname').val();
        var username = $('#edt_username').val();
        var stdno = $('#hiddendata').val();
        var course = $('#edt_course').val();
        var email = $('#edt_email').val();
        var pass = $('#edt_pass').val();

        var params = $('#registerForm').serialize();
        $.post("edt_staff.php", {
        edt_id:stdno, edt_name:fname, edt_mname:mname, edt_lname:lname, edt_username:username, edt_course:course,edt_email:email, edt_pass:pass
      },function(data,status){
        var data = JSON.parse(data);

        if(data.exist == "Empty"){
            $("#edit_btn").modal('hide');
            swal.fire(data.title,data.message,data.icon);
        }else if(data.exist == "exist"){
            $("#edit_btn").modal('hide');
            swal.fire(data.title,data.message,data.icon);
        }else if(data.exist == "success"){
        $("#edit_btn").modal('hide');
        swal.fire(data.title,data.message,data.icon);
         $('#table_staff').DataTable().ajax.reload();
        }
        // alert(data);

        // var jsons = JSON.parse(data);
      //  status = jsons.status;
        // console.log(status)
        if(status =='success'){
        
        }

      });

    };

    function inactiveStuff(name1,id1){
        // alert(name1,id1)
        $('#inactiveUpdateModal').modal("show");
        $('#statname1').html(name1.replaceAll('_',' '));
         $('#idveri1').val(id1);

    };

    function activeStuff(name2,id2){
        $('#activeUpdateModal').modal("show");
        $('#statname2').html(name2.replaceAll('_',' '));
        $('#idveri2').val(id2);
    };

    function activeStuffstatus(){
        var idactive = $('#idveri2').val();
        $.post("delete_voter.php",{idactive:idactive},function(data,status){
            var data = JSON.parse(data);
            $('#activeUpdateModal').modal("hide");
            swal.fire(data.title,data.message,data.icon);
        $('#table_staff').DataTable().ajax.reload();
       
       });
        
    }

    function inactiveStuffstatus(){
                var idinactive = $('#idveri1').val();

                $.post("delete_staff.php",{idinactive:idinactive},function(data,status){
                    var data = JSON.parse(data);
                    $('#inactiveUpdateModal').modal("hide");
                swal.fire(data.title,data.message,data.icon);
                $('#table_staff').DataTable().ajax.reload();

                });
    }
   </script>



</body>
</html>