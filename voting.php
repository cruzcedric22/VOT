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
<form action="process_voting.php" method="post" name = "vot_form">
<div class="row px-3 mx-5" id="maindiv">
<?php
while($row = mysqli_fetch_assoc($result)){
    $pos_id = $row['position_id'];
    ?>


    
    <?php $querypres = "SELECT vot_candidates.id, vot_candidates.name,vot_course.course_name,vot_candidates.photo, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list, vot_course, vot_year WHERE (vot_candidates.position_id = '$pos_id' AND vot_position.position_id = '$pos_id') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND vot_candidates.course_id = vot_course.course_id AND vot_year.id = vot_candidates.year_id ORDER BY vot_candidates.position_id ASC";
    $selectpres = mysqli_query($conn, $querypres); ?>
    <div class = 'col-6'>
            <h3><?php 
                echo $row['pos_name'];
            ?>
            </h3>
        
       
       
            <select class="form-select-sm" aria-label="Default select example"  name='<?php echo "candidates".$row['id'] ?>' id="<?php echo "candidates".$row['pos_name'] ?>">
            <option value="" selected><?php echo $row['pos_name'] ?></option>
        
            <?php while($row1 = mysqli_fetch_assoc($selectpres)) { 
                    ?>
                    
                    <option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
            <?php   }  ?> </select>  
            

    
                
                <div  id="<?php echo "can_card".str_replace('-','', $row['pos_name']) ?>">
                    <div>
                                <div class="card " style="width: 18rem;">
                                    <img src="" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                    </div>
                                </div>         
                    </div>
                </div>
    </div>

    
   
  

        <script src ="js/jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    
        <script type="text/javascript">
            var <?php echo "myDiv".str_replace('-','', $row['pos_name']) ?> = document.getElementById('<?php echo "can_card".str_replace('-','', $row['pos_name']) ?>');
        
            <?php echo "myDiv".str_replace('-','', $row['pos_name']) ?>.style.visibility = 'hidden';
            $(document).ready(function(){
                $("<?php echo '#candidates'.$row['pos_name'] ?>").on('change',function(){
                    var value = $("<?php echo '#candidates'.$row['pos_name'] ?>").val();
                    //alert(value)
                    <?php echo "myDiv".str_replace('-','', $row['pos_name']) ?>.style.visibility = 'visible';
                    $.ajax({
                        url:"fetch.php",
                        type:"POST",
                        data:'request=' + value,
                        success:function(data){
                        $('<?php echo "#can_card".str_replace('-','', $row['pos_name']) ?>').html(data);
                        //  $('#btnsubmit').html(data);
                        
                        }
                        
                    })
                });
            });
        </script>
       <?php }?> 
            <div class="text-center" >
                        <input class="btn btn-sm" style="font-weight: bolder;" name="submit" type="submit">
            </div>  
         
        </form>
    
</div>
                
        
    


    
    
</body>
</html>

