<?php 
include("config.php");
if(isset($_POST['add_year'])){
    $added_year = $_POST['added_year'];



$selectvalidate = "SELECT * FROM vot_year WHERE year = '$added_year'";
$result = $conn->query($selectvalidate);

if($added_year == ""){
    echo "<script> alert ('Input Year'); </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1000); </script>";
}else{
if ($result -> num_rows > 0){
    echo "<script> alert ('year already exist'); </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'elect_year.php'
    },1000); </script>";
}else{
    $insert_year = "INSERT INTO vot_year (year) VALUES ('$added_year')";
if($conn->query($insert_year)){
    echo "<script> alert('success') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'elect_year.php'
    },1000); </script>";
}else{
    die($conn->error);
}
}

}

}

if(isset($_POST['del_year'])){
    $del_year = $_POST['year_del'];

    $del_query = "DELETE FROM vot_year WHERE id = '$del_year'";
    if($conn->query($del_query) === True){
        echo "<script> alert('success') </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'elect_year.php'
        },1000); </script>";
    
    }else{
        die($conn -> error);
    }
    
}