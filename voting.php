<?php 
session_start(); 
include('voters.php');
// for trial only delete later 
include('config.php');

$user_log = $_SESSION['username']; 


$session_elect = "SELECT * FROM vot_session";
    $exe2 = $conn ->query($session_elect);
        while($row = mysqli_fetch_assoc($exe2)){
            $_SESSION['is_election'] = $row['is_election'];
        }
$elec_start = $_SESSION['is_election'];
$voted = $_SESSION['isvoted'];
$cat_name = $_SESSION['cat_name'];



if($voted == 1 || $elec_start == 0){
    echo "<script> setTimeout(() => {
        window.location.href = 'voters.php'
    },1); </script>";
}elseif($cat_name != 'Voter'){
    echo "<script> setTimeout(() => {
        window.location.href = 'admin.php'
    },1000); </script>";
}


$selectpos = "SELECT * FROM vot_position";
$result = mysqli_query($conn, $selectpos);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>



          
         
       
    


<div class="container-fluid px-4">
                <h1>Voting</h1>
                <?php while($row = mysqli_fetch_assoc($result)){ 
                     $pos_id = $row['position_id'];?>
                <div class="p-3 bg-white shadow-sm d-flex rounded">
                    <div>
                    <form action="process_voting.php" method="post" id="voting_form" name = "vot_form">
                        <div class="row mx-2">
                        <h3><?php echo $row['pos_name'] ?></h3>
                            <?php $query = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.photo, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list,vot_course, vot_year WHERE (vot_candidates.position_id = '$pos_id' AND vot_position.position_id = '$pos_id') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND (vot_course.course_id = vot_candidates.course_id AND vot_year.id = vot_candidates.year_id) AND (vot_year.status = 1 AND vot_candidates.status =1) ORDER BY vot_candidates.position_id ASC;";
                             $selectpopulate = mysqli_query($conn, $query); 
                             while($row2 = mysqli_fetch_assoc($selectpopulate)){ ?> 
                            <div class="col">
                            <img src="<?php echo "webimg/".$row2['photo'] ?>" class="img-table-responsive img-thumbnail rounded" width="100" alt="PHOTO">
                            </div>
                
                            <div class="col">
                            <p class="p-0 m-0" style="color: #F29E10; font-weight: bolder; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row2['name'].' '.$row2['m_initial'].' '.$row2['lname'] ?></p>
                            <p class="p-0 m-0" style="font-weight:lighter; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row2['course_name'] ?></p>
                            <p class="p-0 m-0" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row2['party_name'] ?></p>
                            </div>
                            <div class="col mx-3">
                                <input class="mt-3" type="radio" name="<?php echo 'vot_'.$row['pos_name']; ?>" id="vot_pres" value="<?php echo $row2['id'] ?>">
                            </div>
                            <script>
                                   
                                        
                                        
                                    
                                        
                                </script>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
              
                <div class="text-center" >
                        <input class="btn btn-sm" style="font-weight: bolder;" name="submit" type="submit">
                        
                </div>  
                </form>
        
    </div>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
                
    
        



    
    
</body>
</html>

