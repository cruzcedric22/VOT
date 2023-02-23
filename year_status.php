<?php 
include("config.php");

// if(isset($_POST['year_inactive'])){
//     $year_id = $_POST['year_id'];
//     $delete = "UPDATE vot_year SET status = 0 WHERE id = '$year_id'";
//     $executedel = $conn -> query($delete);
//     echo "<script> alert('Year Inactive'); </script>";
//     echo "echo <script> setTimeout(() => {
//         window.location.href = 'elect_year.php'
//     },1); </script>";
// }

// if(isset($_POST['year_active'])){
//     $year_id = $_POST['year_id'];
//     $delete = "UPDATE vot_year SET status = 1 WHERE id = '$year_id'";
//     $executedel = $conn -> query($delete);
//     echo "<script> alert('Year Active'); </script>";
//     echo "echo <script> setTimeout(() => {
//         window.location.href = 'elect_year.php'
//     },1); </script>";
// }

if(isset($_POST['update'])){
    $id = $_POST['update'];
  
    $sql = "SELECT * FROM vot_year WHERE id= $id";
    $result= mysqli_query($conn,$sql);
    $response= array();
  
    while($row = mysqli_fetch_assoc($result)){
      $response =$row;
    }
    echo json_encode($response);
  
  }else {
    $response['status']=200;
    $response['message']='Invalid or data not found';
  }

  if(isset($_POST['hiddendata'])){
    $s = $_POST['hiddendata'];
    // $c = $_POST['updateCourse'];
    $Status= $_POST['updatestatus'];
    
    
    
    
    
    $sql1 = "UPDATE vot_year SET status= '$Status' WHERE id=$s";
    $results= mysqli_query($conn,$sql1);
    
    
    if($sql1 == true){
    
      $data = array(
        'status'=>'success',
      );
      echo json_encode($data);
    }else {
    
      $data = array(
        'status'=>'failed',
      );
      echo json_encode($data);
    }
}
    