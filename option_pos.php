<?php 
include("config.php");


$output = '<select class="form-select" aria-label="Default select example" name="pos_del" id="pos_del">
<option value="">Position</option>';


$sql= "SELECT * FROM vot_position"; 
$results = mysqli_query($conn,$sql);

while($r = mysqli_fetch_assoc($results)){
    $output.= '<option value ='.$r['id'].'>'.$r['pos_name'].'</option>';
  }
      $output.='</select>';
    
               
echo $output;