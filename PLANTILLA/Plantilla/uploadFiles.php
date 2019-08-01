<?php

   include("connection.php");

   if(isset($_FILES["attachments"])){
      $response = array();
      for($i = 0; $i < sizeof($_FILES["attachments"]["name"]); $i++){
         $fileTempName = $_FILES["attachments"]["tmp_name"][$i];
         $fileName = basename($_FILES["attachments"]["name"][$i]);
         $fileSize = $_FILES["attachments"]["size"][$i];
         $fileType = explode("/", $_FILES["attachments"]["type"][$i])[1];
         $fileErrors = $_FILES["attachments"]["error"][$i];
         $filePath = "../../uploads/" . $fileName;
         $status = fileValidation($filePath, $fileSize, $fileErrors);
         $response[$fileName] = $status;
         if($status === ""){
            move_uploaded_file($fileTempName, $filePath);
            saveFile($fileName, $fileType, $filePath, $fileSize);
         }
      }
      exit(json_encode($response));
   }

   function fileValidation($filePath, $fileSize, $fileErrors){
      $output = "";
      if(file_exists($filePath)){
         $output = "exists";
      }else if($fileSize > 10000000){
         $output = "sizeExceeded";
      }else if($fileErrors > 0){
         $output = "error";
      }
      return($output);
   }

   function saveFile($fileName, $fileType, $filePath, $fileSize){
      try{
         global $db_name;
         $pdo = connect();
         $query = "USE $db_name";
         $pdo->query($query);
         $query = 
            "INSERT INTO uploads (
               nombre,
               tipo,
               ruta,
               tamaño
            ) VALUES (
               :fileName,
               :fileType,
               :filePath,
               :fileSize
            )";
         $result = $pdo->prepare($query);
         $result->bindValue(":fileName", $fileName);
         $result->bindValue(":fileType", $fileType);
         $result->bindValue(":filePath", $filePath);
         $result->bindValue(":fileSize", $fileSize);
         $result->execute();
         $pdo = null;
      }catch(Exception $e){
         die("ERROR: " . $e->getMessage());
      }
   }

?>