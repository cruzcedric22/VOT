<?php 
include('config.php');
if(isset($_POST['submit_party'])){
$party_id_count = "SELECT COUNT(partylist_id) AS count_party FROM vot_party_list";
$exe1 = mysqli_query($conn,$party_id_count);
$countid = mysqli_fetch_array($exe1);
$countparty=$countid['count_party'];
$party_name = $_POST['add_party'];
$countparty += 1;

$selectvalidate = "SELECT * FROM vot_party_list WHERE party_name = '$party_name'";
$result = $conn->query($selectvalidate);

if($party_name == ""){
    echo "<script> alert ('Input Party List Name') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1000); </script>";
}else{
if ($result -> num_rows > 0){
    echo "<script> alert ('party list already exist') </script>";
    echo "<script> setTimeout(() => {
        window.location.href = 'candidates.php'
    },1000); </script>";
}else{
    $insert_party = "INSERT INTO vot_party_list (partylist_id,party_name) VALUES ('$countparty', '$party_name')";
if($conn->query($insert_party)){
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

if(isset($_POST['delete_party'])){
    $del_party = $_POST['party_del'];

    $del_query = "DELETE FROM vot_party_list WHERE id = '$del_party'";
    if($conn->query($del_query) === True){
        echo "<script> alert('success') </script>";
        echo "<script> setTimeout(() => {
            window.location.href = 'candidates.php'
        },1000); </script>";
    
    }else{
        die($conn -> error);
    }
    
}
