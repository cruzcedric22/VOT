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
</head>
<body>
<div class="container">
        <div class="row p-2">
                    <h2>LOGS</h2>
            <div class="p-3 bg-white shadow-sm w-100 rounded">
                        <div class="row">
                            <div class="col">
                                        <center>
                                            <table class="table table-bordered table-sm table-dark" id="table">
                                            
                                                <thead>
                                                    <tr>
                                                        <th>LOGS</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <?php while($row = mysqli_fetch_array($result)){?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $row['action'].' '.$row['added_by'] ; ?></td>
                                                        <td><?php echo date('F d, Y , g:i A',strtotime(str_replace(',',',', $row['time']))) ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            
                                            </table>
                                        </center>
                               

                                   

                                   
                               
                            </div>
                        </div>
                       
            </div>
        </div>
    </div>

    
</body>
</html>