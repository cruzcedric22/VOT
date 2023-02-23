<?php 
include("config.php");


$output = '<select class="form-select" aria-label="Default select example" name="year_del" id="year_del">
<option value="" class="text-center">YEAR</option>';


$sql= "SELECT * FROM vot_year"; 
$results = mysqli_query($conn,$sql);

while($r = mysqli_fetch_assoc($results)){
    $output.= '<option value ='.$r['id'].'>'.$r['year'].'</option>';
  }
      $output.='</select>';
    
               
echo $output;