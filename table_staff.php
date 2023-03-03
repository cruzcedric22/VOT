<?php 

include('config.php');

$populatetb = "SELECT vot_users.username, vot_users.password, vot_user_profile.fname, vot_user_profile.m_initial, vot_course.course_id, vot_user_profile.lname, vot_user_profile.status, vot_course.course_name, vot_user_profile.email, vot_user_profile.student_no, vot_year.year FROM vot_users, vot_user_profile, vot_course, vot_year WHERE (vot_users.category_id = 2) AND (vot_users.student_no = vot_user_profile.student_no) AND (vot_course.course_id = vot_user_profile.course_id) AND vot_year.id = vot_user_profile.year_id";
$result = $conn ->query($populatetb);


$rows = array();
$data = array();

while($row = mysqli_fetch_assoc($result)){
    $fname = $row['fname'];
    $username = $row['username'];
    $course = $row['course_name'];
    $year = $row['year'];
    
    $subarray = array();


    $subarray[] = "<td>".$fname."</td>";
    $subarray[] = "<td>".$username."</td>";
    $subarray[] = "<td>".$course."</td>";
    $subarray[] = "<td>".$year."</td>";
    if($row['status'] == 1){
    $subarray[] = "<td><h5 style='color: #20c997; font-size:small;'>Active</h5></td>";
    }elseif($row['status'] == 2){
    $subarray[] = "<td><h5 style='color: red; font-size:small;'>Inactive</h5></td>";
    }
    if($row ['status'] == 1){
    $subarray[] = "<td> <button type='button' class='btn btn-warning bi bi-pen-fill' style='font-size:small;' onclick=editStaff('".str_replace(' ','_',$row['fname'])."','".str_replace(' ','_',$row['m_initial'])."','".str_replace(' ','_',$row['lname'])."','".$row['username']."','".$row['course_name']."','".$row['course_id']."','".$row['email']."','".$row['student_no']."')>Edit</button>
    <button type='button' class='btn btn-danger bi bi-exclamation' style='font-size:small;' onclick=inactiveStuff('".str_replace(' ','_',$row['fname'])."','".$row['student_no']."')>Inactive</button></td>";
    }
    if($row ['status'] == 2){
    $subarray[] = "<td> <button type='button' class='btn btn-warning bi bi-pen-fill' style='font-size:small;' onclick=editStaff('".str_replace(' ','_',$row['fname'])."','".str_replace(' ','_',$row['m_initial'])."','".str_replace(' ','_',$row['lname'])."','".$row['username']."','".$row['course_name']."','".$row['course_id']."','".$row['email']."','".$row['student_no']."')>Edit</button>
    <button type='button' class='btn btn-success bi bi-check' style='font-size:small;' onclick=activeStuff('".str_replace(' ','_',$row['fname'])."','".$row['student_no']."')>Active</button></td>";
    }
    $data[]=$subarray;

}
$output = array(
    'data'=>$data,
  );
  
  echo json_encode($output);