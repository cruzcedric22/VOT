<?php 
include("config.php");


$output = '<select class="form-select" aria-label="Default select example" name="party_del" id="party_del">
<option value="">Party</option>';


$sql= "SELECT * FROM vot_party_list"; 
$results = mysqli_query($conn,$sql);

while($r = mysqli_fetch_assoc($results)){
    $output.= '<option value ='.$r['id'].'>'.$r['party_name'].'</option>';
  }
      $output.='</select>';
    
               
echo $output;