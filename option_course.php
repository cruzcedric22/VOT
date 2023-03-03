<?php 
include('config.php');

$output = '<select class="form-select" aria-label="Default select example" name="pos_course" id="pos_course">
<option value="" >Courses</option>';


$select3 = "SELECT * FROM vot_course";
$exe2 = mysqli_query($conn,$select3);

while($row3 = mysqli_fetch_assoc($exe2)){
   $output .=  "<option value=".$row3['course_id']."> ".$row3['course_name']."</option>";
}

$output.='</select>';

echo $output;