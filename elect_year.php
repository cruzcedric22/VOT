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
                    <!-- <h5>List of Election Years:</h5>
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
                        </div> -->
                        <form method="POST">
                        <h5>Add a Year:</h5>
                        <div class="mb-3">
                        <input type="text" class="form-control" value="" id="yearName" name="added_year" >
                        </div>
                        <?php $select3 = "SELECT * FROM vot_year";
                            $exe2 = mysqli_query($conn,$select3);
                            ?>
                    <h5>Delete Year:</h5>
                    <select class="form-select" aria-label="Default select example" id="year_del" name="year_del">
                     <option value="" class="text-center">YEAR</option> 
                         <?php while($row3 = mysqli_fetch_assoc($exe2)){ ?>
                    <option value="<?php echo $row3['id']?>"><?php echo $row3['year']?></option> 
                    <?php } ?>
                    </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="add_Year()" name="add_year">Submit</button>
                        <button type="button" class="btn btn-danger" onclick="deleteYear()" name="del_year">Delete</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>


                      <div class="table-responsive-lg mt-2">
                        <table class="table table-bordered table-sm table-dark" id="table" style="width:100%" >
                          <thead>
                            <tr align = "center">
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                        </table>
            </div>
            </div>
        </div>

            <!-- Updaate Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <!-- <label for="Courses" class="form-label">COURSES</label> -->
            <!-- <input type="text" class="form-control" id="updatecourses" placeholder="ADD COURSES"> -->
            <!-- <input type="text" class="form-control" id="updatestatus" placeholder="Set Status"> -->
            <label for="" class="form-label mt-2">Status</label>
            <select class="form-control" name="" id="updatestatus">

              <option value="">Select</option>
              <option value="1">Enable</option>
              <option value="0">Disable</option>


            </select>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  onclick="u()" data-bs-dismiss="modal">Update</button>
          <input type="hidden" id="hiddendata">
        </div>
      </div>
    
<script>
     $( document ).ready(function() {
          $('#table').DataTable({
            'serverside':true,
            'processing':true,
            'paging':true,
            "columnDefs": [
                {
                    "classmate": "dt-center", "targets": "_all"
                },],
        
        'ajax':{
            'url':'table_year.php',
            'type':'post',
         },
         'fnCreateRow':function(nRow,aData,iDataIndex){
            $(nRow).attr('id',aData[0]);
         }
         
         });

       
         

      
        //  $('#year_can').on('change', function () {
        //     table.search( this.value ).draw();
        //     } );

        // $('#year_can').on('change', function () {
        //     table.search( this.value ).draw();
        //     } );
     
       


    
   
    });
   
    function add_Year(){
     var yearName = $('#yearName').val();
            // alert(yearName);
           
      $.post("add_year.php", {
      yearName:yearName,
      },function(data,status){

        // var jsons = JSON.parse(data);
      //  status = jsons.status;
        // console.log(status)
        if(status =='success'){
          $("#addyear").modal('hide');
         $('#table').DataTable().ajax.reload();
         $('#yearName').val("");
         reloadDropdown();
        }

      });

   

         }

function deleteYear(){
     var yearName = $('#year_del').val();
            // alert(yearName);
           
      $.post("add_year.php", {
      yearDel:yearName,
      },function(data,status){

        // var jsons = JSON.parse(data);
      //  status = jsons.status;
        // console.log(status)
        if(status =='success'){
          $("#addyear").modal('hide');
         $('#table').DataTable().ajax.reload();
         reloadDropdown();
        }

      });
         }


function reloadDropdown(){
  $.ajax({
          type: "POST",
          url: "option_year.php",
         
          success: function(result) {
            // alert(result);
            // $("#year_del").reload();
            // $("#year_del").load("elect_year.php");
            $("#year_del").html(result);


          },
          error: function(result) {
            alert('error');
          }
        });
}
    
function up(update){

$('#hiddendata').val(update);
$.post("year_status.php",{update:update},function(data,
status){
    var userid= JSON.parse(data);
    // console.log(userid);

    // $('#updatecourses').val(userid.courses);
    $('#updatestatus').val(userid.status);
});
$('#updateModal').modal("show");

};


function u(){
      var updatestatus = $('#updatestatus').val();
    //   var updateCourse = $('#updatecourses').val();
      var hiddendata = $('#hiddendata').val();

      $.post("year_status.php", {
        hiddendata:hiddendata ,updatestatus:updatestatus
      },function(data,status){

        var jsons = JSON.parse(data);
        status = jsons.status;
        if(status =='success'){
          var update=  $('#table').DataTable().ajax.reload();
        }


      });

    }

</script>
</body>
</html>