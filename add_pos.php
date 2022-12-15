<?php 
include('config.php');
if(isset($_POST['submit_pos'])){
$pos_id_count = "SELECT COUNT(position_id) AS count_pos FROM vot_position";
$exe1 = mysqli_query($conn,$pos_id_count);
$countid = mysqli_fetch_array($exe1);
$countpos=$countid['count_pos'];
$pos_name = $_POST['add_pos'];
$countpos += 1;

$selectvalidate = "SELECT * FROM vot_position WHERE pos_name = '$pos_name'";
$result = $conn->query($selectvalidate);

if($pos_name == ""){
    echo "<script> alert ('Input Position Name') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1000); </script>";
}else{
if ($result -> num_rows > 0){
    echo "<script> alert ('Position Already Exist') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1000); </script>";
}else{
    $insert_pos = "INSERT INTO vot_position (position_id,pos_name) VALUES ('$countpos', '$pos_name')";
if($conn->query($insert_pos)){
    echo "<script> alert('success') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1000); </script>";
}else{
    die($conn->error);
}
}

}


}

if(isset($_POST['delete_pos'])){
    $del_pos = $_POST['pos_del'];
    $del_query = "DELETE FROM vot_position WHERE id = '$del_pos'";
    if($conn->query($del_query) === True){
        echo "<script> alert('success') </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'candidates.php'
        },1000); </script>";
    
    }else{
        die($conn -> error);
    }
}