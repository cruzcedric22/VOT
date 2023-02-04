<?php 
include("config.php");

if(isset($_POST['year_inactive'])){
    $year_id = $_POST['year_id'];
    $delete = "UPDATE vot_year SET status = 0 WHERE id = '$year_id'";
    $executedel = $conn -> query($delete);
    echo "<script> alert('Year Inactive'); </script>";
    echo "echo <script> setTimeout(() => {
        window.location.href = 'elect_year.php'
    },1); </script>";
}

if(isset($_POST['year_active'])){
    $year_id = $_POST['year_id'];
    $delete = "UPDATE vot_year SET status = 1 WHERE id = '$year_id'";
    $executedel = $conn -> query($delete);
    echo "<script> alert('Year Active'); </script>";
    echo "echo <script> setTimeout(() => {
        window.location.href = 'elect_year.php'
    },1); </script>";
}