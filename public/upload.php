<?php
use App\Avance;
$target_dir = "Archivos/"; // Upload directory

$request = 1;
if(isset($_POST['request'])){ 
  $request = $_POST['request'];
}

// Upload file
if($request == 1){ 
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $msg = ""; 
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $msg = "Successfully uploaded";
    list($nombre, $bitacora, $IDBitacora, $avance, $IDAvance, $extension) = split('[_.]', $_FILES["file"]["name"]);
    $avance = Avance::find($IDAvance);
    $avance->ruta="htt://localHost:8000/Archivos/".$_FILES["file"]["name"];
    $avance->save(); 
  }else{    
    $msg = "Error while uploading"; 
  } 
  echo $msg;
  exit;
}

// Remove file
if($request == 2){ 
  $filename = $target_dir.$_POST['name'];  
  unlink($filename); 
  exit;
}