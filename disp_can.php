<?php
include("config.php");

$result = array();

// Retrieve the data sent via AJAX
$allChecked = json_decode($_POST['allChecked'], true);

// Access the individual elements in the $allChecked array
$result[] = '<div class="text-center">';
$result[] = '<form id="cast_votes">';
$number = 1;
foreach ($allChecked as $checked) {
  $posName = $checked['pos_name'];
  $value = $checked['value'];
  
  // Perform your desired actions with the data (e.g., database operations, calculations, etc.)
  
  $sql = "SELECT * FROM vot_candidates WHERE id = '$value'";
  $exe = $conn->query($sql);
  
while ($row = mysqli_fetch_array($exe)) {
    $result[] = '<p>' . $number++ . '. Position:'.$posName.': '. $row['name'] . ' ' . $row['m_initial'] .' '.$row['lname']. '</p>';
    $result[] = '<input type="hidden" name="candidate_id[]" value="' . $value . '">';
}
}




$result[] = '</form>';
$result[] = '</div>';

echo implode("", $result);
?>
