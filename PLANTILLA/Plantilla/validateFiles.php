<?php

if(isset($_FILES["attachments"])){
   $response = array();
   for($i = 0; $i < sizeof($_FILES["attachments"]["name"]); $i++){
      $fileTempName = $_FILES["attachments"]["tmp_name"][$i];
      $fileName = basename($_FILES["attachments"]["name"][$i]);
      $fileSize = $_FILES["attachments"]["size"][$i];
      $fileType = $_FILES["attachments"]["type"][$i];
      $fileErrors = $_FILES["attachments"]["error"][$i];
      $filePath = "../../uploads/" . $fileName;
      $status = fileValidation($filePath, $fileSize, $fileErrors);
      $response[$fileName] = $status;
      if($status === ""){
         move_uploaded_file($fileTempName, $filePath);
      }
   }
   exit(json_encode($response));
}

function fileValidation($filePath, $fileSize, $fileErrors){
   $output = "";
   if(file_exists($filePath)){
      $output = "exists";
   }else if($fileSize > 50000000){
      $output = "sizeExceeded";
   }else if($fileErrors > 0){
      $output = "error";
   }
   return($output);
}