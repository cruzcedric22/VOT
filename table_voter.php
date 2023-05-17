<?php 

include("config.php");

$sql = "SELECT vot_users.username, vot_users.password, vot_user_profile.date_created, vot_user_profile.course_id, vot_user_profile.status, vot_user_profile.fname, vot_user_profile.m_initial, vot_user_profile.lname, vot_course.course_name, vot_user_profile.email, vot_user_profile.student_no, vot_year.year, vot_user_profile.course_id, vot_user_profile.qr FROM vot_users, vot_user_profile, vot_course, vot_year WHERE (vot_users.category_id = 1) AND (vot_users.student_no = vot_user_profile.student_no) AND (vot_course.course_id = vot_user_profile.course_id) AND vot_year.id = vot_user_profile.year_id";
$result = mysqli_query($conn,$sql);


$rows = array();
$data = array();
$number = 1;

while($row = mysqli_fetch_assoc($result)){
    $fnamme = $row['fname'];
    $username = $row['username'];
    $stdno = $row['student_no'];
    $course = $row['course_name'];
    $year = $row['year'];
    $qrdic = $row ['qr'];
    
    $subarray = array();

    $subarray[] = "<td>".$number++."</td>";
    $subarray[] = "<td>".$fnamme."</td>";
    $subarray[] = "<td>".$username."</td>";
    $subarray[] = "<td>".$stdno."</td>";
    $subarray[] = "<td>".$course."</td>";
    $subarray[] = "<td>".$year."</td>";
    if($row['status'] == 1){
    $subarray[] = "<td class = 'text-center'><h5 style='color: #20c997; font-size:small;'>Active</h5></td>";
    }
    if($row['status'] == 0){
        $subarray[] = "<td class = 'text-center'><h5 style='color: red; font-size:small;'>Not Verified</h5></td>";
    }
    if($row['status'] == 2){
        $subarray[] = "<td class = 'text-center'><h5 style='color: red; font-size:small;'>Inactive</h5></td>";
    }
 
    $subarray[] = "<td>".date('F d, Y , g:i A',strtotime(str_replace(',',',', $row["date_created"])))."</td>";
  
    
    if($row['status'] == 0) {
    $subarray[] = "<td>
    <button class='btn btn-warning bi bi-pen-fill text-center' style='font-size:small;' onclick=up('".str_replace(' ','_',$row['fname'])."','".str_replace(' ','_',$row['m_initial'])."','".str_replace(' ','_',$row['lname'])."','".$row['username']."','".$row['course_name']."','".$row['course_id']."','".$row['email']."','".$row['student_no']."')>Edit</button>
    <button type='button' class='btn btn-success bi bi-check' style='font-size:small;'  onclick=verify('".str_replace(' ','_',$row['fname'])."','".$row['student_no']."')>Verify</button>
    <button type='button' class='btn btn-info bi bi-qr-code' style='font-size:small;' onclick=qrshow('".$qrdic."')>QR</button></td>";
    }


    if($row['status'] == 1) {
    $subarray[] = "<td>
    <button class='btn btn-warning bi bi-pen-fill text-center' style='font-size:small;' onclick=up('".str_replace(' ','_',$row['fname'])."','".str_replace(' ','_',$row['m_initial'])."','".str_replace(' ','_',$row['lname'])."','".$row['username']."','".$row['course_name']."','".$row['course_id']."','".$row['email']."','".$row['student_no']."')>Edit</button>
    <button type='button' class='btn btn-danger bi bi-exclamation-lg' style='font-size:small;' onclick=inactive('".str_replace(' ','_',$row['fname'])."','".$row['student_no']."')>Inactive</button>
    <button type='button' class='btn btn-info bi bi-qr-code' style='font-size:small;' onclick=qrshow('".$qrdic."')>QR</button></td>";
    }


    if($row['status'] == 2) {
    $subarray[] = "<td>
    <button class='btn btn-warning bi bi-pen-fill text-center' style='font-size:small;' onclick=up('".str_replace(' ','_',$row['fname'])."','".str_replace(' ','_',$row['m_initial'])."','".str_replace(' ','_',$row['lname'])."','".$row['username']."','".$row['course_name']."','".$row['course_id']."','".$row['email']."','".$row['student_no']."')>Edit</button>
    <button type='button' class='btn btn-success bi bi-check-all' style='font-size:small;' onclick=active('".str_replace(' ','_',$row['fname'])."','".$row['student_no']."')>Active</button>
    <button type='button' class='btn btn-info bi bi-qr-code' style='font-size:small;' onclick=qrshow('".$qrdic."')>QR</button></td>";
    
    }





    $data[]=$subarray;

}
$output = array(
    'data'=>$data,
  );
  
  echo json_encode($output);