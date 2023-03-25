<?php include('admin.php'); 
include('config.php');

$populatetable = "SELECT * FROM vot_logs ORDER BY time DESC";
$result = $conn ->query($populatetable);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
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
                    <h2>LOGS</h2>
            <div class="p-3 bg-white shadow-sm w-100 rounded">
          <?php   if(mysqli_num_rows($result)>0){ ?>
                      <div class="table-responsive-lg mt-2">
                        <table class="table table-bordered table-sm table-dark" id="table_log" style="width:100%" >
                          <thead>
                            <tr align = "center">
                            <th>LOGS</th>
                            <th>Time</th>
                            </tr>
                          </thead>
                          <tbody>
                        <tr>
                        <?php while($row = mysqli_fetch_array($result)){?>
                        <td><?php echo $row['action'].' '.$row['added_by'] ; ?></td>
                        <td><?php echo date('F d, Y , g:i A',strtotime(str_replace(',',',', $row['time']))) ?></td> 
                        </tr>                   
                            <?php } }?>
                          </tbody>
                        </table>
            </div>
            </div>
        </div>\


        <script href ="//cdn.datatables.net/plug-ins/1.13.4/sorting/datetime-moment.js"></script>

<script>
     $( document ).ready(function() {
         var table =  $('#table_log').DataTable();
     
         
        //  $('#year_can').on('change', function () {
        //     table.search( this.value ).draw();
        //     } );

        // var rowCount = table.rows().count();
        // console.log(rowCount);
    });

</script>
   
    
</body>
</html>