<?php
include 'connection.php';
// SAVE TEMPLATE FUNCTION

if ( isset($_POST['html']) && isset($_POST['name']) ) {
  $created = time();
  $name = $conn->real_escape_string($_POST['name']);
  $template = $conn->real_escape_string($_POST['html']);
  $template = str_replace('//amp;','&',$template);
  $sql = "INSERT INTO mjml_templates (name, template, created_at, updated_at)
          VALUES ('$name', '$template', NOW(), NOW())
          ON DUPLICATE KEY UPDATE template = '$template', updated_at = NOW()";

  if ($conn->query($sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}

// LOAD TEMPLATE FUNCTION
?>
