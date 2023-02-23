<?php

include('config.php');

$sql = "SELECT * FROM vot_year";
$result = mysqli_query($conn,$sql);

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)){
    
    $year = $row['year'];
    $status = $row['status'];

    $subarray = array();

    $subarray[] = '<td>'.$year.'</td>';
    
    if($status == 1){
    $subarray[] = '<td class="text-center"><h5 style ="color:green; font-size:medium;">Enable</h5> </td>';
    }
    else if($status == 0){
    $subarray[] = '<td class="text-center"> <h5 style="color: red; font-size:medium;">Inactive</h5> </td>';
    }

    $subarray[]='<td>
      <button class="btn btn-success bi bi-pen-fill text-center" style="font-size:small;" onclick="up('.$row['id'].')"></button> </td>';
    $data[]=$subarray;
}


$output = array(
  'data'=>$data,


);

echo json_encode($output);


?>

