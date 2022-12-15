<?php
include('config.php');

$chart_pres = "SELECT vot_candidates.name, vot_candidates.position_id,vot_candidates.cand_votes, vot_position.pos_name FROM vot_candidates,vot_position WHERE vot_candidates.position_id = 1 && vot_position.position_id = 1";
$result1 = $conn->query($chart_pres);

// $chart_vice = "SELECT candidates.name, candidates.position_id,candidates.cand_votes, position.pos_name FROM candidates,position WHERE candidates.position_id = 2 && position.position_id = 2";
// $result2 = $conn->query($chart_vice);

// $chart_sec = "SELECT candidates.name, candidates.position_id,candidates.cand_votes, position.pos_name FROM candidates,position WHERE candidates.position_id = 3 && position.position_id = 3";
// $result3 = $conn->query($chart_sec);

// $chart_tre = "SELECT candidates.name, candidates.position_id,candidates.cand_votes, position.pos_name FROM candidates,position WHERE candidates.position_id = 4 && position.position_id = 4";
// $result4 = $conn->query($chart_tre);

// $chart_aud = "SELECT candidates.name, candidates.position_id,candidates.cand_votes, position.pos_name FROM candidates,position WHERE candidates.position_id = 5 && position.position_id = 5";
// $result5 = $conn->query($chart_aud);

// $chart_pio = "SELECT candidates.name, candidates.position_id,candidates.cand_votes, position.pos_name FROM candidates,position WHERE candidates.position_id = 6 && position.position_id = 6";
// $result6 = $conn->query($chart_pio);

$json_array = array();
// $json_array1 = array();
// $json_array2 = array();
// $json_array3 = array();
// $json_array4 = array();
// $json_array5 = array();




while($row = mysqli_fetch_assoc($result1)){
   $json_array[] = array('x'=>$row['name'],'y'=>$row['cand_votes']);
}
$pres_arr = array("president"=>array($json_array));

// while($row = mysqli_fetch_assoc($result2)){
//    $json_array1[] = array('x'=>$row['name'],'y'=>$row['cand_votes']);
// }
// $vice_arr = array("vice_president"=>array($json_array1));

// while($row = mysqli_fetch_assoc($result3)){
//    $json_array2[] = array('x'=>$row['name'],'y'=>$row['cand_votes']);
// }
// $sec_arr = array("Secretary"=>array($json_array2));

// while($row = mysqli_fetch_assoc($result4)){
//    $json_array3[] = array('x'=>$row['name'],'y'=>$row['cand_votes']);
// }
// $tre_arr = array("Treasurer"=>array($json_array3));

// while($row = mysqli_fetch_assoc($result5)){
//    $json_array4[] = array('x'=>$row['name'],'y'=>$row['cand_votes']);
// }
// $aud_arr = array("Auditor"=>array($json_array4));

// while($row = mysqli_fetch_assoc($result6)){
//    $json_array5[] = array('x'=>$row['name'],'y'=>$row['cand_votes']);
// }
// $pio_arr = array("PIO"=>array($json_array5));


//$com_array=array_merge($pres_arr,$vice_arr,$sec_arr,$tre_arr,$aud_arr,$pio_arr);

echo json_encode($pres_arr);


//echo json_encode($com_array);
//echo json_encode($chart);