
<?php //include('voters.php');
    include('config.php');
// for trial only delete later 
if(isset($_POST['post']) == 'votMobile') {


    
$canNameArr = $courseNameArr = $posNameArr = $picNameArr = $canIdArr = array();

$selectpos = "SELECT * FROM vot_position";
$result = mysqli_query($conn, $selectpos);


while($row = mysqli_fetch_assoc($result)){
    $pos_id = $row['position_id'];
   


    
    $querypres = "SELECT vot_candidates.id, vot_candidates.name,vot_course.course_name,vot_candidates.photo, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list, vot_course WHERE (vot_candidates.position_id = '$pos_id' AND vot_position.position_id = '$pos_id') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND vot_candidates.course_id = vot_course.course_id ORDER BY vot_candidates.position_id ASC";
    $selectpres = mysqli_query($conn, $querypres); 
             while($row = mysqli_fetch_assoc($selectpres)) { 
                     array_push($canNameArr,$row['name']);
                     array_push($courseNameArr,$row['course_name']);
                     array_push($posNameArr,$row['pos_name']);
                     array_push($picNameArr,$row['photo']);
                     array_push($canIdArr,$row['id']);



                  
                   
                  
              } }
            $canNameArr = implode(",",$canNameArr);
            $courseNameArr = implode(",",$courseNameArr);
            $posNameArr = implode(",",$posNameArr);
            $picNameArr = implode(",",$picNameArr);
            $canIdArr = implode(",",$canIdArr);

            $result = array('canNameArr' => $canNameArr,'courseNameArr' => $courseNameArr, 'posNameArr' => $posNameArr, 'picNameArr' => $picNameArr, 'canIdArr' => $canIdArr);
            
            echo json_encode($result);
            // echo json_encode($canNameArr );
            // echo "</br>"; 
            // echo json_encode($courseNameArr);
            // echo "</br>"; 
            // echo json_encode($posNameArr);
            // echo "</br>"; 
            // echo json_encode($picNameArr);

            // echo "</br>"; 
// echo "tanginmo";
            // echo json_encode($canIdArr);
}
else{
    echo "unauthorized access";
}
            ?> 
            

    
                
               
                
        
    


    


