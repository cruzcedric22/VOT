<?php 
include('config.php');

$sql = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.status, vot_candidates.course_id,vot_candidates.photo, vot_candidates.position_id, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id, vot_year.year FROM vot_candidates, vot_position, vot_party_list, vot_course, vot_year WHERE (vot_candidates.position_id = vot_position.position_id) AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND (vot_course.course_id = vot_candidates.course_id) AND (vot_candidates.year_id = vot_year.id) ORDER BY vot_candidates.position_id ASC;";
$result = mysqli_query($conn,$sql);

$rows = array();
$data = array();


while($row = mysqli_fetch_assoc($result)){

    $fname = $row['name'];
    $course = $row['course_name'];
    $pos = $row['pos_name'];
    $party = $row['party_name'];
    $photo = $row['photo'];
    $year = $row['year'];
    $subarray = array();

    $subarray[] = "<td>".$fname."</td>";
    $subarray[] = "<td>".$course."</td>";
    $subarray[] = "<td>".$pos."</td>";
    $subarray[] = "<td>".$party."</td>";
    $subarray[] = "<td><img src='webimg/".$photo."'  class='img-table-responsive img-thumbnail' style='border: solid 1px'  width='100' alt='...'></td>";
    $subarray[] = "<td>".$year."</td>";
    if($row['status'] == 1){
    $subarray[] = "<td class = 'text-center'><h5 style='color: #20c997; font-size:small;'>Active</h5></td>";
    }elseif($row ['status'] == 0){
    $subarray[] = "<td class = 'text-center'><h5 style='color: red; font-size:small;'>Conceded</h5></td>";
    }elseif($row['status'] == 2){
    $subarray[] = "<td class = 'text-center'><h5 style='color: red; font-size:small;'>Not Verified</h5></td>";       
    }

    if($row['status'] == 0) {
        $subarray[] = "<td>
        <button type='button' class='btn btn-warning bi bi-pen-fill' onclick=editCanModal('".$row['id']."','".str_replace(' ', '_', $row['name'])."','".str_replace(' ', '_', $row['m_initial'])."','".str_replace(' ', '_', $row['lname'])."','".str_replace(' ', '_', $row['course_name'])."','".$row['course_id']."','".$row['pos_name']."','".$row['position_id']."','".$row['party_name']."','".$row['partylist_id']."')>Edit</button>
        <button type='button' class='btn btn-success bi bi-check'>Active</button></td>";
        }
    
    
        if($row['status'] == 1) {
        $subarray[] = "<td>
        <button type='button' class='btn btn-warning bi bi-pen-fill' onclick=editCanModal('".$row['id']."','".str_replace(' ', '_', $row['name'])."','".str_replace(' ', '_', $row['m_initial'])."','".str_replace(' ', '_', $row['lname'])."','".str_replace(' ', '_', $row['course_name'])."','".$row['course_id']."','".str_replace('-','_',$row['pos_name'])."','".$row['position_id']."','".$row['party_name']."','".$row['partylist_id']."')>Edit</button>
        <button type='button' class='btn btn-danger bi bi-c-circle-fill'>Concede</button></td>";
        }
    
        if($row['status'] == 2) {
        $subarray[] = "<td>
        <button type='button' class='btn btn-warning bi bi-pen-fill' onclick=editCanModal('".$row['id']."','".str_replace(' ', '_', $row['name'])."','".str_replace(' ', '_', $row['m_initial'])."','".str_replace(' ', '_', $row['lname'])."','".str_replace(' ', '_', $row['course_name'])."','".$row['course_id']."','".$row['pos_name']."','".$row['position_id']."','".$row['party_name']."','".$row['partylist_id']."')>Edit</button>
        <button type='button' class='btn btn-success bi bi-check'>Verify</button></td>";
        }

        $data[]=$subarray;
   
}

$output = array(
    'data'=>$data,
  );
  
  echo json_encode($output);
