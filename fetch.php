<?php 
include('config.php');
if(isset($_POST['request'])){

    $request = $_POST['request'];
    $query ="SELECT vot_candidates.id,vot_candidates.name,vot_candidates.m_initial,vot_candidates.lname,vot_course.course_name,vot_candidates.photo,vot_position.pos_name,vot_party_list.party_name,vot_party_list.partylist_id FROM vot_candidates,vot_position,vot_party_list,vot_course,vot_year WHERE (vot_candidates.position_id = vot_position.position_id) AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND (vot_candidates.id = '$request') AND vot_candidates.course_id = vot_course.course_id AND vot_year.id = vot_candidates.year_id";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
}
?>


    
<?php while($row = mysqli_fetch_assoc($result)){  ?>
    <div class="row mt-1" id="<?php echo "can_card".str_replace('-', '', $row['pos_name']) ?>">
            <div class="col-6">
                    <div class="card ms-5 px-5 rounded" style="width: 18rem; background-color: #FCE8D2;">
                    <img src="webimg/<?php echo $row['photo'] ?>" class="img-table-responsive img-thumbnail rounded-circle" style='height: 200px; border: solid;' >
                    <div class="card-body">
                        <p class="card-text text-center" style="color:#FD8419; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: bold;"><?php echo $row['name'] . ' '. $row['m_initial'] . ' ' . $row['lname']  ?></p>
                        <p class="card-text text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row['course_name'] ?></p>
                        <p class="card-text text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row['pos_name'] ?></p>
                        <p class="card-text text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row['party_name'] ?></p>
                    </div>
                    </div>
                
                    
            </div>
        
        </div>
       
 <?php } ?>
 <!-- <div id= 'btnsubmit'>
                <input class="btn btn-sm " name="submit" type="submit">
        </div> -->
    
        


   