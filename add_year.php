<?php 
include("config.php");
if(isset($_POST['yearName'])){
    $added_year = $_POST['yearName'];




$selectvalidate = "SELECT * FROM vot_year WHERE year = '$added_year'";
$result = $conn->query($selectvalidate);

if($added_year == ""){
    // echo "<script> alert ('Input Year'); </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'candidates.php'
    // },1000); </script>";
}else{
if ($result -> num_rows > 0){
    // echo "<script> alert ('year already exist'); </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'elect_year.php'
    // },1000); </script>";
}else{
    $insert_year = "INSERT INTO vot_year (year) VALUES ('$added_year')";
    
if($conn->query($insert_year)){
    // echo "<script> alert('success') </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'elect_year.php'
    // },1000); </script>";
    $msg['title'] = "Successful";
    $msg['message'] =  "Successfully Registered";
    $msg['icon'] =  "success";
}else{
    die($conn->error);
}
}

}
echo json_encode($msg);

}

if(isset($_POST['yearDel'])){
    $del_year = $_POST['yearDel'];

    $del_query = "DELETE FROM vot_year WHERE id = '$del_year'";
    if($conn->query($del_query) === True){
        // echo "<script> alert('success') </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'elect_year.php'
        // },1000); </script>";
        $msg['title'] = "Successful";
		$msg['message'] =  "Successfully Deleted";
		$msg['icon'] =  "success";
    
    }else{
        die($conn -> error);
    }
    echo json_encode($msg);
}


