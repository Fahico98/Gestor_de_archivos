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
      if(file_exists($filePath)){
         $response[$fileName] = "exists";
      }else if($fileSize > 50000000){
         $response[$fileName] = "sizeExceeded";
      }else if($fileErrors > 0){
         $response[$fileName] = "error";
      }else{
         move_uploaded_file($fileTempName, $filePath);
      }
   }
   exit(json_encode($response));
}
