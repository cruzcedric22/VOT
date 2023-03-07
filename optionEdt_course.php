<?php
// pag di nagamit burahin
include('config.php');
$retainCourse = $_POST['courseedt'];
$retainCourseid = $_POST['courseidedt'];



$output = '<select class="form-select" aria-label="Default select example"  name="edt_course" id="edt_course">
<option selected id="op1" value="'.$retainCourseid.'">'.$retainCourse.'</option>';


$select3 = "SELECT * FROM vot_course";
$exe2 = mysqli_query($conn,$select3);

while($row3 = mysqli_fetch_assoc($exe2)){
   $output .=  "<option value=".$row3['course_id']."> ".$row3['course_name']."</option>";
}

$output.='</select>';

echo $output;