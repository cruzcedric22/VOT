<?php 
include('config.php');

$interval = "SELECT MAX(id) as intervalVar FROM vot_candidates";
$result = $conn ->query($interval);
while($row6 = mysqli_fetch_assoc($result)){
    $intervar = $row6['intervalVar'];
}
echo json_encode($intervar);
?>