<?php 
include('config.php');
include('admin.php');

$populatetable = "SELECT * FROM vot_year";
$result = $conn ->query($populatetable);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Year</title>
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
<body>
<div class="container">
        <div class="row p-2">
                    <h2>Election Year</h2>
            <div class="p-3 bg-white shadow-sm w-100 rounded">
             <!-- <h3>Year:</h3>
                     <select class="form-select w-25 mb-2" id="year_can">
                            <option value="">Select All</option>   
                         <?php
                          ?>
                            <option value="<?php ?>">Active</option>  
                            <option>Inactive</option>  
                         <?php ?>
                     </select> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addyear">
                Add Year
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addyear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Year</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h5>List of Election Years:</h5>
                    <?php $select2 = "SELECT * FROM vot_year";
                        $result2 = mysqli_query($conn,$select2); ?>
                        <div class="row">
                            <?php  while($row2 = mysqli_fetch_assoc($result2)){ 
                            ?>
                            <div class="col-6">
                            <p class="m-0 mb-2"><?php echo $row2['year'] ?></p>
                            </div>
                            <?php } ?>
                            <?php ?>
                        </div>
                        <form action="add_year.php" method="POST">
                        <h5>Add a Year:</h5>
                        <div class="mb-3">
                        <input type="text" class="form-control" value="" name="added_year" >
                        </div>
                        <?php $select3 = "SELECT * FROM vot_year";
                            $exe2 = mysqli_query($conn,$select3);
                            ?>
                    <h5>Delete Year:</h5>
                    <select class="form-select" aria-label="Default select example" name="year_del">
                        <?php while($row3 = mysqli_fetch_assoc($exe2)){ ?>
                    <option value="<?php echo $row3['id']?>"><?php echo $row3['year']?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_year">Submit</button>
                        <button type="submit" class="btn btn-danger" name="del_year">Delete</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
          <?php   if(mysqli_num_rows($result)>0){ ?>
                      <div class="table-responsive-lg mt-2">
                        <table class="table table-bordered table-sm table-dark" id="table_log" style="width:100%" >
                          <thead>
                            <tr align = "center">
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                        <tr>
                        <?php while($row = mysqli_fetch_array($result)){?>
                        <td><?php echo $row['year'] ?></td>
                        <td class="text-center"><?php if($row['status'] == 1){ ?>
                            
                            <h5 style="color: green;">Active</h5>
                            <?php }elseif($row['status'] == 0){ ?>
                                <h5 style="color: red;">Inactive</h5>
                                <?php } ?>
                            </td> 
                        <td><!-- Button trigger modal -->
                        <?php if($row['status'] == 1){ ?>
                        <button type="button" class="btn btn-danger bi bi-exclamation-triangle-fill" data-bs-toggle="modal" data-bs-target="<?php echo "#statusyear".$row['id'].str_replace('-','',$row['year']) ?>">
                        Inactive
                        </button>
                        <?php }elseif($row['status'] == 0){ ?>
                            <button type="button" class="btn btn-success bi bi-check2-all" data-bs-toggle="modal" data-bs-target="<?php echo "#statusyear".$row['id'].str_replace('-','',$row['year']) ?>">
                        Active
                        </button>
                            <?php } ?>
                        </td> 
                        </tr>       
                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo "statusyear".$row['id'].str_replace('-','',$row['year']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                            <?php if($row['status'] == 1){ ?>
                                <h5 class="modal-title" id="staticBackdropLabel">Inactive</h5>
                                <?php }elseif($row['status'] == 0){ ?>
                                    <h5 class="modal-title" id="staticBackdropLabel">Active</h5>
                                    <?php } ?>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="year_status.php" method="POST">
                            <div class="modal-body">
                                <?php if($row['status'] == 1){ ?>
                                <input type="text" value="<?php echo $row['id'] ?>" name="year_id" hidden>
                                <h1 class="bi bi-exclamation-triangle-fill d-flex justify-content-center" style="color: red ;"></h1>
                                <p class=" d-flex justify-content-center text-black">Are you suer you want to set <?php echo $row['year']?> inactive?</p>
                                <?php }elseif($row['status'] == 0){ ?>
                                    <input type="text" value="<?php echo $row['id'] ?>" name="year_id" hidden>
                                <h1 class="bi bi-check2-all d-flex justify-content-center" style="color: green ;"></h1>
                                <p class=" d-flex justify-content-center text-black">Are you suer you want to set <?php echo $row['year']?> active?</p>
                               <?php  } ?>
                            </div>
                            <div class="modal-footer">
                                <?php if($row['status'] == 1){ ?>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="year_inactive">Submit</button>
                                <?php }elseif($row['status'] == 0){ ?>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="year_active">Submit</button>
                                    <?php } ?> 
                            </div>
                            </div>
                            </form>
                        </div>
                        </div>            
                            <?php } }?>
                          </tbody>
                        </table>
            </div>
            </div>
        </div>

<script>
     $( document ).ready(function() {
         var table =  $('#table_log').DataTable();
         
        //  $('#year_can').on('change', function () {
        //     table.search( this.value ).draw();
        //     } );

        $('#year_can').on('change', function () {
            table.search( this.value ).draw();
            } );
   
    });

</script>
</body>
</html>