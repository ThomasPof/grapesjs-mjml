<?php
if($_FILES) {
  $resultArray = array();
	foreach ( $_FILES as $file){
    if ($file['error'] != UPLOAD_ERR_OK) {
      error_log($file['error']);
      echo JSON_encode(null);
    }
    $target_dir = "uploads/";
    $path = pathinfo($file['name']);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $file['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";

    if(move_uploaded_file($temp_name,$path_filename_ext)) {
      $result=array(
        'name'=>$file['name'],
        'type'=>'image',
        'src'=>$actual_link.$path_filename_ext,
        'height'=>getimagesize($actual_link.$path_filename_ext)[0],
        'width'=>getimagesize($actual_link.$path_filename_ext)[1]
      );
    } else {
      $result=array(
        'error'=> 'unable to move file',
        'file'=> $file,
        'path' => $path
      );
    }
    array_push($resultArray,$result);
 	}
  $response = array( 'data' => $resultArray );
  echo json_encode($response);
}
?>
