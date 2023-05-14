<?php //session_start();
      include('admin.php') ;
      include('config.php');
     $log_id = $_SESSION['id'];
     $log_user = $_SESSION['username'];

     $interval = "SELECT MAX(id) as intervalVar FROM vot_candidates";
        $result = $conn ->query($interval);
        while($row6 = mysqli_fetch_assoc($result)){
            $intervar = $row6['intervalVar'];
        }

     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
   <style>
    .dataTables_filter{
        margin-bottom: 8px;
    }
 
   </style>
</head>

<?php 


?>

<body>
    <div class="container">
        <div class="row p-2">
                    <h2>CANDIDATES</h2>
            <div class="p-3 bg-white shadow-sm w-100 rounded">
            <div class="row">
         <div class="col-md-12">
                    <h3>Year:</h3>
                     <select class="form-select w-25" id="year_can">
                            <option value="">Select All</option>   
                         <?php
                           $query = "SELECT year FROM vot_year";
                           $exe6 = $conn -> query($query);
                           while($row6 = mysqli_fetch_assoc($exe6)){
                          ?>
                            <option><?php echo $row6['year'] ?></option>  
                         <?php } ?>
                     </select>
                     <div class="row mt-2">
                                    <div class="col-1">
                                        <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info mb-2" style="font-weight: bold; font-size:small;" data-bs-toggle="modal" data-bs-target="#addparty">
                                    Add Partylist
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addparty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Partylist</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <h5>List of Partylist:</h5> -->
                                             <?php $select = "SELECT * FROM vot_party_list";
                                                    $result1 = mysqli_query($conn,$select); ?>
                                                <div class="row">
                                                  <?php  while($row1 = mysqli_fetch_assoc($result1)){ 
                                                        ?>
                                                        <!-- <div class="col-6">
                                                        <p class="m-0 mb-2"><?php echo $row1['party_name'] ?></p>
                                                        </div> -->
                                                        <?php } ?>
                                                        <?php ?>
                                                </div>
                                                    <h5>Add a Party list:</h5>
                                                    <form action="add_party.php" method="POST">
                                                    <div class="mb-3">
                                                    <input type="text" class="form-control" value="" name="add_party" id="add_party">
                                                    </div>
                                                    <?php $select2 = "SELECT * FROM vot_party_list";
                                                          $exe1 = mysqli_query($conn,$select2);
                                                         ?>
                                                         <h5>Delete Partylist:</h5>
                                                    <select class="form-select" aria-label="Default select example" name="party_del" id="party_del">
                                                    <option value="">Party</option>
                                                        <?php while($row2 = mysqli_fetch_assoc($exe1)){ ?>
                                                    <option value="<?php echo $row2['id']?>"><?php echo $row2['party_name']?></option>
                                                    <?php } ?>
                                                    </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" onclick="addParty()" name="submit_party" class="btn btn-primary">Submit</button>
                                            <button type="button" onclick="deleteParty()" name="delete_party" class="btn btn-danger">Delete</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-1">
                                         <!-- Button trigger modal -->
                                    <button type="button" class="btn mb-2" style="background-color: #20c997; font-weight: bold; color:white; font-size:small;" data-bs-toggle="modal" data-bs-target="#addpos">
                                    Add Position
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addpos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Position</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <!-- <h5>List of Position:</h5> -->
                                             <!-- <?php $select2 = "SELECT * FROM vot_position";
                                                    $result2 = mysqli_query($conn,$select2); ?>
                                                    <div class="row">
                                                     <?php  while($row2 = mysqli_fetch_assoc($result2)){ 
                                                        ?>
                                                        <div class="col-6">
                                                        <p class="m-0 mb-2"><?php echo $row2['pos_name'] ?></p>
                                                        </div>
                                                        <?php } ?>
                                                        <?php ?>
                                                    </div> -->
                                                    <h5>Add a position:</h5>
                                                    <form action="add_pos.php" method="POST">
                                                    <div class="mb-3">
                                                    <input type="text" class="form-control" value="" name="add_pos" id="add_pos">
                                                    </div>
                                                    <?php $select3 = "SELECT * FROM vot_position";
                                                          $exe2 = mysqli_query($conn,$select3);
                                                         ?>
                                                    <h5>Delete Position:</h5>
                                                    <select class="form-select" aria-label="Default select example" name="pos_del" id="pos_del">
                                                    <option value="">Position</option>
                                                        <?php while($row3 = mysqli_fetch_assoc($exe2)){ ?>
                                                    <option value="<?php echo $row3['id']?>"><?php echo $row3['pos_name']?></option>
                                                    <?php } ?>
                                                    </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" onclick="addPos()" name="submit_pos" class="btn btn-primary">Submit</button>
                                            <button type="button" onclick="deletePos()" name="delete_pos" class="btn btn-danger">Delete</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                </div>
          
                     
                   <?php

$populatetb = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.status, vot_candidates.course_id,vot_candidates.photo, vot_candidates.position_id, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id, vot_year.year FROM vot_candidates, vot_position, vot_party_list, vot_course, vot_year WHERE (vot_candidates.position_id = vot_position.position_id) AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND (vot_course.course_id = vot_candidates.course_id) AND (vot_candidates.year_id = vot_year.id) ORDER BY vot_candidates.position_id ASC;";
$result = $conn ->query($populatetb);       
                  
                    ?>
                      <div class="table-responsive-lg mt-2">
                        <table class="table table-bordered table-sm table-dark" id="table_can" style="width:100%" >
                          <thead>
                            <tr align = "center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Position</th>
                                <th>Partylist</th>
                                <th>Photo</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                           
                                                      
                          </tbody>

                        </table>


            
            </div>
            </div>


              <!-- modal for candidate active -->
              <div class="modal fade" id="activeCan"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update User Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="bi bi-check d-flex justify-content-center" style="color: green;"></h2>
                                         <p class="text-center p-0 m-0"> Are you sure you want to set candidate <span id="statname"></span> to active</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="activeStatus()" class="btn btn-success">Active</button>
                                        <input type="hidden" id="log_name">
                                        <input type="hidden" id="del_active">
                                        <input type="hidden" id="log_id1" value="<?php echo $log_id ?>">
                                        <input type="hidden" id="log_user1" value="<?php echo $log_user ?>">
                                    </div>
                                    </div>
                                </div>
                                </div>

                                
              <!-- modal for candidate concede -->
              <div class="modal fade" id="concedeCan"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update User Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <h2 class="bi bi-exclamation-lg d-flex justify-content-center" style="color: red;"></h2>
                                         <p class="text-center p-0 m-0"> Are you sure you want to set candidate <span id="statname1"></span> to concede</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="concedeStatus()" class="btn btn-danger">Concede</button>
                                        <input type="hidden" id="log_name1">
                                        <input type="hidden" id="del_id">
                                        <input type="hidden" id="log_id2" value="<?php echo $log_id ?>">
                                        <input type="hidden" id="log_user2" value="<?php echo $log_user ?>">
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- modal for candidate verify -->
              <div class="modal fade" id="verifyCan"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update User Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="bi bi-check d-flex justify-content-center" style="color: green;"></h2>
                                         <p class="text-center p-0 m-0"> Are you sure you want to verify candidate <span id="statname2"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="verifyStatus()" class="btn btn-success">Verify</button>
                                        <input type="hidden" id="log_name2">
                                        <input type="hidden" id="del_verify">
                                        <input type="hidden" id="log_id3" value="<?php echo $log_id ?>">
                                        <input type="hidden" id="log_user3" value="<?php echo $log_user ?>">
                                    </div>
                                    </div>
                                </div>
                                </div>
            
            <!-- edit candidates modal -->
            <div class="modal fade" id='edit_btn' data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_btnLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-dialog-centered">
                <div class="modal-content overflow-auto">
                        
                            <div class="modal-header">
                                <h5 class="modal-title text-black" id="edit_btnLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        
                            <div class="modal-body text-black">
                        <form action="edt_can.php" id="formEdtCan"  method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" value="" name="edt_name" id="edt_name" >
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
                                <label for="" class="form-label">Course</label>
                                <select class="form-select" name="edt_course" id="edt_course" aria-label="Default select example">
                                    <option selected id="firstOp" value=""></option>
                                    <?php $query = "SELECT * FROM vot_course";
                                          $exe = mysqli_query($conn,$query);
                                          while($row1 = mysqli_fetch_assoc($exe)){ ?>
                                    <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name']; ?></option>
                                    <?php } ?>                                                                                        </select>
                                </div>
                                <div class="mb-3">
                                <label for="" class="form-label">Position</label>
                                <select class="form-select" name="edit_pos" id="edit_pos">
                                <option value="" id="fistOpPos" selected></option>
                                <?php $populatepos = "SELECT * FROM vot_position";
                                    $execute = $conn -> query($populatepos);
                                     while($row1 = mysqli_fetch_assoc($execute)){ ?>
                                    <option  value="<?php echo $row1['position_id'] ?>"><?php echo $row1['pos_name'] ?></option>
                                    <?php  } ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="" class="form-label">Party-list</label>
                                <select class="form-select" name="edit_party" id="edit_party">
                                <option value="" id="firstOpParty" selected></option>
                                    <?php $populateparty= "SELECT * FROM vot_party_list"; 
                                        $execute1 = $conn -> query($populateparty);
                                        while($row2 = mysqli_fetch_assoc($execute1)){
                                    ?>                                                                                        
                                    <option  value="<?php echo $row2['partylist_id'] ?>"><?php echo $row2['party_name'] ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input type="file" class="form-control btn btn-outline-warning" name="edt_photo" accept=".jpg, .jpeg, .png" id="edt_photo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                                 <input type="text" value="" name="edt_id" id="edt_id" hidden>
                                <input type="text" value="" name="log_name4" id="log_name4" hidden> 
                                 <input type="text" value="<?php echo $log_id ?>" name="log_id" id="log_id" hidden>
                                <input type="text" value="<?php echo $log_user ?>" name="log_user" id="log_user" hidden> 
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="editCan()" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                            </div>
                </div>
                
    </div>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $( document ).ready(function() {

        checkIfDbChange();
        
        $('#table_can').DataTable({
            'serverside':true,
            'processing':true,
            'paging':true,
            "columnDefs": [
                {
                    "classmate": "dt-center", "targets": "_all"
                },],
        
        'ajax':{
            'url':'table_candidates.php',
            'type':'post',
         },
         'fnCreateRow':function(nRow,aData,iDataIndex){
            $(nRow).attr('id',aData[0]);
         }
         
         });





         var table =  $('#table_can').DataTable();
         table.column( 6 ).visible( false );
         $('#year_can').on('change', function () {
            table.search( this.value ).draw();
            } );
    });
    // $('#search').keypress(function(){
    //     var params = $('#search').value;
    //     $.post('search_can.php',params).then(response =>{
    //         setTimeout(() => {
    //             window.location.href = "candidates.php"
    //         },1);
    //     })
    // })

 var highestId = <?php echo $intervar ?>;
//  console.log(highestId);

    function checkIfDbChange(){
        $.ajax({
            url:"inter_can.php",
            method:"POST",
            success:function(data)
            {
                var data = JSON.parse(data);
                console.log(data);
                if(data > highestId){
                    $('#table_can').DataTable().ajax.reload();

                }

                // var data = JSON.parse(data);
                // $('#edt_photo').val('');
                // $('#edit_btn').modal('hide');
                // swal.fire(data.title,data.message,data.icon);
                // $('#table_can').DataTable().ajax.reload();
            },complete: function(){
                setTimeout(checkIfDbChange,5000);

            }
        });


        

    };

    function editCanModal(id,fname,mname,lname,courseName,courseId,posName,posId,partyName,partyId){
        $('#edt_name').val(fname.replaceAll('_',' '));
        $('#edt_mname').val(mname.replaceAll('_',' '));
        $('#edt_lname').val(lname.replaceAll('_',' '));
        $('#edt_id').val(id);
        $('#log_name4').val(fname);
        $('#firstOp').text(courseName);
        $('#firstOp').val(courseId);
        $('#fistOpPos').text(posName);
        $('#fistOpPos').val(posId);
        $('#firstOpParty').text(partyName);
        $('#firstOpParty').val(partyId);
        // $('#log_name').val(fname);
        $('#edit_btn').modal('show');
    };
   // How to upload image using ajax 
    function editCan(){
        $('#formEdtCan').serialize();
        var form_data = new FormData(document.getElementById('formEdtCan'));
        var id = $('#edt_id').val(); // mema
        var log_name = $('#log_name').val(); // mema 
        // alert(id)
        // var file = $('#edt_photo').prop('files')[0];
    // var oFReader = new FileReader();
        //  oFReader.readAsDataURL(document.getElementById("edt_photo").files[0]);
        //  form_data.append('edt_id',id);
        //  form_data.append('log_name',log_name);
        // var json = JSON.stringify(form_data);
        // console.log(form_data);
        // alert(json);
        for (const value of form_data.values()) {
            console.log(value);
            }

            $.ajax({
            url:"edt_can.php",
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                var data = JSON.parse(data);
                $('#edt_photo').val('');
                $('#edit_btn').modal('hide');
                swal.fire(data.title,data.message,data.icon);
                $('#table_can').DataTable().ajax.reload();
            }
        });
        
    };

    function addParty(){
        var partyname = $('#add_party').val();
        // alert(partyname);
        if(partyname == ""){
            Swal.fire(
            'INPUT PARTY NAME',
            '',
            'warning'
                )
        }else{
        // alert(coursename);
        $.post("add_party.php",{add_party:partyname
        },function(data,status){
            var data = JSON.parse(data);
            if(status == 'success'){
                $("#addparty").modal('hide');
                swal.fire(data.title,data.message,data.icon);
                reloadDropdownParty();
                $('#add_party').val("");
            }

        });
    }
    };

    function deleteParty(){
        var party_del = $('#party_del').val();
        // alert(partyname);
       
        // alert(coursename);
        $.post("add_party.php",{party_del:party_del
        },function(data,status){
            var data = JSON.parse(data);
            if(status == 'success'){
                $("#addparty").modal('hide');
                swal.fire(data.title,data.message,data.icon);
                reloadDropdownParty();
                $('#party_del').val("");
            }

        });
    };

    function reloadDropdownParty(){
        $.ajax({
          type: "POST",
          url: "option_party.php",
         
          success: function(result) {
           
            $("#party_del").html(result);
            
          },
          error: function(result) {
            alert('error');
          }
        });
    };

    function addPos(){
        var add_pos = $('#add_pos').val();
        // alert(partyname);
        if(add_pos == ""){
            Swal.fire(
            'INPUT PARTY NAME',
            '',
            'warning'
                )
        }else{
        // alert(coursename);
        $.post("add_pos.php",{add_pos:add_pos
        },function(data,status){
            var data = JSON.parse(data);
            if(status == 'success'){
                $("#addpos").modal('hide');
                swal.fire(data.title,data.message,data.icon);
                reloadDropdownPos();
                $('#add_pos').val("");
            }

        });
    }
    };

    
    function deletePos(){
        var pos_del = $('#pos_del').val();
        // alert(partyname);
       
        // alert(coursename);
        $.post("add_pos.php",{pos_del:pos_del
        },function(data,status){
            var data = JSON.parse(data);
            if(status == 'success'){
                $("#addpos").modal('hide');
                swal.fire(data.title,data.message,data.icon);
                reloadDropdownPos();
                $('#pos_del').val("");
            }

        });
    };
    
    function reloadDropdownPos(){
        $.ajax({
          type: "POST",
          url: "option_pos.php",
         
          success: function(result) {
           
            $("#pos_del").html(result);
            
          },
          error: function(result) {
            alert('error');
          }
        });
    };

    function activeCan(id,name){
        $('#activeCan').modal("show");
        $('#statname').html(name.replaceAll('_',' '));
        $('#log_name').val(name.replaceAll('_',' '));
        $('#del_active').val(id);
    };

    function activeStatus(){
        var log_name = $('#log_name').val();
        var del_active = $('#del_active').val();
        var log_id = $('#log_id1').val();
        var log_user = $('#log_user1').val();
        $.post("del_can.php",{log_name:log_name,del_active:del_active,log_id1:log_id,log_user1:log_user
        },function(data,status){
            var data = JSON.parse(data);
            $('#activeCan').modal("hide");
            swal.fire(data.title,data.message,data.icon);
            $('#table_can').DataTable().ajax.reload();
        });
    };

    function concedeCan(id,name){
        $('#concedeCan').modal("show");
        $('#statname1').html(name.replaceAll('_',' '));
        // alert(name);
        $('#log_name1').val(name.replaceAll('_',' '));
        $('#del_id').val(id);
    };

    function concedeStatus(){
        var log_name1 = $('#log_name1').val();
        var del_id = $('#del_id').val();
        var log_id = $('#log_id2').val();
        var log_user = $('#log_user2').val();
        $.post("del_can.php",{log_name1:log_name1,del_id:del_id,log_id2:log_id,log_user2:log_user
        },function(data,status){
            var data = JSON.parse(data);
            $('#concedeCan').modal("hide");
            swal.fire(data.title,data.message,data.icon);
            $('#table_can').DataTable().ajax.reload();
        });
    };

    function verifyCan(id,name){
        $('#verifyCan').modal("show");
        $('#statname2').html(name.replaceAll('_',' '));
        // alert(name);
        $('#log_name2').val(name.replaceAll('_',' '));
        $('#del_verify').val(id);
    };

    function verifyStatus(){
        var log_name2 = $('#log_name2').val();
        var del_verify = $('#del_verify').val();
        var log_id = $('#log_id3').val();
        var log_user = $('#log_user3').val();
        $.post("del_can.php",{log_name2:log_name2,del_verify:del_verify,log_id3:log_id,log_user3:log_user
        },function(data,status){
            var data = JSON.parse(data);
            $('#concedeCan').modal("hide");
            swal.fire(data.title,data.message,data.icon);
            $('#table_can').DataTable().ajax.reload();
        });

    };

    

    
</script>


    
</body>
</html>

