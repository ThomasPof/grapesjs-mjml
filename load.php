<?php
include 'connection.php';
// SAVE TEMPLATE FUNCTION

if ( isset($_POST['template_name']) ) {
  $template_name = $conn->real_escape_string($_POST['template_name']);

  $sql = "SELECT template FROM mjml_templates WHERE name = '$template_name' LIMIT 1";
  if ($result = $conn->query($sql)) {
    while($row = $result->fetch_assoc()) {
      echo $row['template'];
    }

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

} else {
  $sql = "SELECT name FROM mjml_templates";
  if ($result = $conn->query($sql)) {
    $output = array();
    while($row = $result->fetch_assoc()) {
      array_push($output,$row['name']);
    }
    echo json_encode($output);
  } else {
    echo "Error: " . $sql . "<br>" . $result;
  }
}
$conn->close();

?>
