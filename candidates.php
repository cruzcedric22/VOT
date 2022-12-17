<?php include('admin.php') ;
      include('config.php');
     
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
                                    <button type="button" class="btn btn-info mb-2" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#addparty">
                                    Add Partylist
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addparty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Partylist</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>List of Partylist:</h5>
                                             <?php $select = "SELECT * FROM vot_party_list";
                                                    $result1 = mysqli_query($conn,$select); ?>
                                                <div class="row">
                                                  <?php  while($row1 = mysqli_fetch_assoc($result1)){ 
                                                        ?>
                                                        <div class="col-6">
                                                        <p class="m-0 mb-2"><?php echo $row1['party_name'] ?></p>
                                                        </div>
                                                        <?php } ?>
                                                        <?php ?>
                                                </div>
                                                    <h5>Add a Party list:</h5>
                                                    <form action="add_party.php" method="POST">
                                                    <div class="mb-3">
                                                    <input type="text" class="form-control" value="" name="add_party" >
                                                    </div>
                                                    <?php $select2 = "SELECT * FROM vot_party_list";
                                                          $exe1 = mysqli_query($conn,$select2);
                                                         ?>
                                                         <h5>Delete Partylist:</h5>
                                                    <select class="form-select" aria-label="Default select example" name="party_del">
                                                        <?php while($row2 = mysqli_fetch_assoc($exe1)){ ?>
                                                    <option value="<?php echo $row2['id']?>"><?php echo $row2['party_name']?></option>
                                                    <?php } ?>
                                                    </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit_party" class="btn btn-primary">Submit</button>
                                            <button type="submit" name="delete_party" class="btn btn-danger">Delete</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-1">
                                         <!-- Button trigger modal -->
                                    <button type="button" class="btn mb-2" style="background-color: #20c997; font-weight: bold; color:white;" data-bs-toggle="modal" data-bs-target="#addpos">
                                    Add Position
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addpos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Position</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <h5>List of Position:</h5>
                                             <?php $select2 = "SELECT * FROM vot_position";
                                                    $result2 = mysqli_query($conn,$select2); ?>
                                                    <div class="row">
                                                     <?php  while($row2 = mysqli_fetch_assoc($result2)){ 
                                                        ?>
                                                        <div class="col-6">
                                                        <p class="m-0 mb-2"><?php echo $row2['pos_name'] ?></p>
                                                        </div>
                                                        <?php } ?>
                                                        <?php ?>
                                                    </div>
                                                    <h5>Add a position:</h5>
                                                    <form action="add_pos.php" method="POST">
                                                    <div class="mb-3">
                                                    <input type="text" class="form-control" value="" name="add_pos" >
                                                    </div>
                                                    <?php $select3 = "SELECT * FROM vot_position";
                                                          $exe2 = mysqli_query($conn,$select3);
                                                         ?>
                                                    <h5>Delete Position:</h5>
                                                    <select class="form-select" aria-label="Default select example" name="pos_del">
                                                        <?php while($row3 = mysqli_fetch_assoc($exe2)){ ?>
                                                    <option value="<?php echo $row3['id']?>"><?php echo $row3['pos_name']?></option>
                                                    <?php } ?>
                                                    </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit_pos" class="btn btn-primary">Submit</button>
                                            <button type="submit" name="delete_pos" class="btn btn-danger">Delete</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
          
                     
                   <?php

$populatetb = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.status, vot_candidates.course_id,vot_candidates.photo, vot_candidates.position_id, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id, vot_year.year FROM vot_candidates, vot_position, vot_party_list, vot_course, vot_year WHERE (vot_candidates.position_id = vot_position.position_id) AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND (vot_course.course_id = vot_candidates.course_id) AND (vot_candidates.year_id = vot_year.id) ORDER BY vot_candidates.position_id ASC;";
$result = $conn ->query($populatetb);       
                     if(mysqli_num_rows($result)>0){
                    ?>
                      <div class="table-responsive-lg mt-2">
                        <table class="table table-bordered table-sm table-dark" id="table_can" style="width:100%" >
                          <thead>
                            <tr align = "center">
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
                            <?php  while($row= mysqli_fetch_array($result)){ ?>

                              <tr id="row<?php echo $row['id'] ?>">
                              <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['course_name']; ?></td>
                                                        <td><?php echo $row['pos_name']; ?></td>
                                                        <td><?php echo $row['party_name']; ?></td>
                                                        <td><img src="webimg/<?php echo $row['photo']?>"  class="img-table-responsive img-thumbnail" style="border: solid 1px"  width="100" alt="..."></td>
                                                        <td><?php echo $row['year'] ?></td>
                                                        <td class="text-center">
                                                            <?php if($row['status'] == 1){ ?>
                                                                <h5 style="color: #20c997;">Active</h5>    
                                                           <?php }elseif($row ['status'] == 0){ ?>
                                                            <h5 style="color: red;">Conceded</h5>
                                                          <?php } ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning bi bi-pen-fill" data-bs-toggle="modal" data-bs-target="<?php echo '#edit_btn'.$row['id'].str_replace(' ', '', $row['name']).str_replace(' ', '', $row['course_name'].$row['pos_name'].$row['position_id'].$row['party_name'].$row['partylist_id']) ?>">Edit</button>
                                                           <?php if($row['status'] == 1){ ?>
                                                            <button type="button" class="btn btn-danger bi bi-c-circle-fill" data-bs-toggle="modal" data-bs-target="<?php echo "#del_btn".$row['id'].str_replace(' ', '', $row['name'])?>">Concede</button></td>
                                                            <?php }elseif($row['status'] == 0){ ?>
                                                                <button type="button" class="btn btn-success bi bi-check" data-bs-toggle="modal" data-bs-target="<?php echo "#del_btn".$row['id'].str_replace(' ', '', $row['name'])?>">Active</button></td>
                                                            <?php } ?>
                                                                           <!-- Modal -->
                                                                           <div class="modal fade" id="<?php echo "del_btn".$row['id'].str_replace(' ', '', $row['name']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <?php if($row['status'] == 1){ ?>
                                                                    <h5 class="modal-title text-black" id="exampleModalLabel">Concede</h5>
                                                                     <?php }elseif($row['status'] == 0){ ?>
                                                                        <h5 class="modal-title text-black" id="exampleModalLabel">Active</h5>
                                                                    <?php } ?>
                                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="del_can.php" method="post"> <input type="text" name="del_id" value="<?php echo $row['id'] ?>" hidden>
                                                                            <?php if($row['status'] == 1){ ?>
                                                                            <h1 class="bi bi-exclamation-triangle-fill d-flex justify-content-center" style="color: red ;"></h1>
                                                                            <p class=" d-flex justify-content-center text-black">Are you sure you candidate <?php echo $row['name']?> wants to concede? </p>    
                                                                            <input type="text" value="<?php echo $row['name']?>" name="log_name" hidden>
                                                                            <?php }elseif($row['status'] == 0){ ?>
                                                                                <h1 class="bi bi-check d-flex justify-content-center" style="color: green ;"></h1>
                                                                            <p class=" d-flex justify-content-center text-black">Are you sure you want candidate <?php echo $row['name']?> to be active? </p>    
                                                                            <input type="text" value="<?php echo $row['name']?>" name="log_name" hidden>
                                                                            <?php } ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <?php if($row['status'] == 1){  ?>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"  name="del_submit" class="btn btn-danger">Submit</button>
                                                                    <?php }elseif($row['status'] == 0){ ?>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"  name="del_active" class="btn btn-success">Submit</button>
                                                                    <?php } ?>
 
                                                                </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                            </div>   
                                                        </td>   


                              </tr>
                                              <div class="modal fade" id="<?php echo 'edit_btn'.$row['id'].str_replace(' ', '', $row['name']).str_replace(' ', '', $row['course_name'].$row['pos_name'].$row['position_id'].$row['party_name'].$row['partylist_id']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit_btnLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-dialog-centered">
                                                                        <div class="modal-content overflow-auto">
                                                                                
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title text-black" id="edit_btnLabel">Edit</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                
                                                                                    <div class="modal-body text-black">
                                                                                <form action="edt_can.php"  method="post" enctype="multipart/form-data">
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Name</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="edt_name" >
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
                                                                                        <label for="" class="form-label">Position</label>
                                                                                        <select class="form-select" name="edit_pos" id="">
                                                                                        <option value="<?php echo $row['position_id'] ?>" selected><?php echo $row['pos_name'] ?></option>
                                                                                        <?php $populatepos = "SELECT * FROM vot_position";
                                                                                            $execute = $conn -> query($populatepos);
                                                                                             while($row1 = mysqli_fetch_assoc($execute)){ ?>
                                                                                            <option  value="<?php echo $row1['position_id'] ?>"><?php echo $row1['pos_name'] ?></option>
                                                                                            <?php  } ?>
                                                                                        </select>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                        <label for="" class="form-label">Party-list</label>
                                                                                        <select class="form-select" name="edit_party" id="">
                                                                                        <option value="<?php echo $row['partylist_id']  ?>" selected><?php echo $row['party_name'] ?></option>
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
                                                                                        <input type="file" class="form-control btn btn-outline-warning" name="edt_photo" accept=".jpg, .jpeg, .png" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                                                        </div>
                                                                                        <input type="text" value="<?php echo $row['id'] ?>" name="edt_id" hidden>
                                                                                        <input type="text" value="<?php echo $row['name']?>" name="log_name" hidden>
                                                                                        
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                                                </form>
                                                                                    </div>
                                                                        </div>
                                                                        
                                                            </div>
                                                   
                                                  
                            <?php }}?>
                          </tbody>

                        </table>


            
            </div>
            </div>


                
<script>
    $( document ).ready(function() {
         var table =  $('#table_can').DataTable();
         table.column( 5 ).visible( false );
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

    
</script>


    
</body>
</html>

