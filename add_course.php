<?php 
include('config.php');
$msg = array();
if(isset($_POST['add_course'])){
$course_id_count = "SELECT COUNT(course_id) AS count_course FROM vot_course";
$exe1 = mysqli_query($conn,$course_id_count);
$countid = mysqli_fetch_array($exe1);
$countcourse=$countid['count_course'];
$course_name = $_POST['add_course'];
$countcourse += 1;


$selectvalidate = "SELECT * FROM vot_course WHERE course_name = '$course_name'";
$result = $conn->query($selectvalidate);

if($course_name == ""){
    // echo "<script> alert ('Input Course Name') </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'list_voters.php'
    // },1000); </script>";
}else{
if ($result -> num_rows > 0){
    // echo "<script> alert ('Course already exist') </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'list_voters.php'
    // },1000); </script>";
}else{
    $insert_course = "INSERT INTO vot_course (course_id,course_name) VALUES ('$countcourse', '$course_name')";
if($conn->query($insert_course)){
    // echo "<script> alert('success') </script>";
    // echo "<script> setTimeout(() => {
    //     window.location.href = 'list_voters.php'
    // },1000); </script>";
    $msg['title'] = "Successful";
    $msg['message'] =  "Successfully Added";
    $msg['icon'] =  "success";
}else{
    die($conn->error);
}
}

}
echo json_encode($msg);


}

if(isset($_POST['pos_course'])){
    $del_course = $_POST['pos_course'];
    $del_query = "DELETE FROM vot_course WHERE id = '$del_course'";
    if($conn->query($del_query) === True){
        // echo "<script> alert('success') </script>";
        // echo "<script> setTimeout(() => {
        //     window.location.href = 'list_voters.php'
        // },1000); </script>";
        $msg['title'] = "Successful";
        $msg['message'] =  "Successfully Deleted";
        $msg['icon'] =  "success";
    
    }else{
        die($conn -> error);
    }
    echo json_encode($msg);
}